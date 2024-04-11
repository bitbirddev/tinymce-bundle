<?php

declare(strict_types=1);

namespace bitbirddev\TinyMceBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

use function dirname;

final class TinyMceBundle extends AbstractPimcoreBundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    protected function getComposerPackageName(): string
    {
        // getVersion() will use this name to read the version from
        // PackageVersions and return a normalized value
        return 'bitbirddev/tinymce-bundle';
    }

    public function getNiceName(): string
    {
        return 'bitbirddev/tinymce-bundle';
    }
}
