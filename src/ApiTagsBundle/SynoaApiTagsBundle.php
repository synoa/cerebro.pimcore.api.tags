<?php

namespace ApiTagsBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class ApiTagsBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/apitags/js/pimcore/startup.js'
        ];
    }
}
