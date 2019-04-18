<?php

namespace ApiTagsBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\Rest\Element\AssetController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pimcore\Http\Exception\ResponseException;
use Pimcore\Model\Asset;
use Pimcore\Model\Element\Tag;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AssetController
{
    /**
     * @Route("webservice/rest/asset/{id}"), requirements={"id": "\d+"}, methods={"GET"})
     *
     * @param Request  $request
     * @param int|null $id
     *
     * @return JsonResponse
     *
     * @throws ResponseException
     * @throws \Exception
     */
    public function getAction(Request $request, $id = null)
    {
        $id = $this->resolveId($request, $id);
        $asset = $this->loadAsset($id);

        $this->checkElementPermission($asset, 'get');

        if ($asset instanceof Asset\Folder) {
            $object = $this->service->getAssetFolderById($id);
        } else {
            $light = $request->get('light');
            $options = [
                'LIGHT' => $light ? 1 : 0
            ];

            $object = $this->service->getAssetFileById($id, $options);
            $algo = 'sha1';

            $thumbnailConfig = $request->get('thumbnail');
            if ($thumbnailConfig && $asset->getType() === 'image') {
                /** @var Asset\Image $asset */
                $checksum = $asset->getThumbnail($thumbnailConfig)->getChecksum($algo);

                $object->thumbnail = (string) $asset->getThumbnail($thumbnailConfig);
            } else {
                $checksum = $asset->getChecksum($algo);
            }

            $object->checksum = [
                'algo' => $algo,
                'value' => $checksum
            ];

            if ($light) {
                unset($object->data);
            }
        }

        $object->tags = Tag::getTagsForElement('asset', $id);

        return $this->createSuccessResponse($object);
    }
}
