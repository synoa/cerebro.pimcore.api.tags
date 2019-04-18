<?php

namespace ApiTagsBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class SynoaApiTagsBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/synoaapitags/js/pimcore/startup.js'
        ];
    }
}
