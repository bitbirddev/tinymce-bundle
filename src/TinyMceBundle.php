<?php

declare(strict_types=1);

namespace bitbirddev\TinyMceBundle;

use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;
use bitbirddev\TinyMceBundle\DependencyInjection\TinyMceExtension;
use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

class TinyMceBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    private const CONFIG_DIR = '/config';

    private const SERVICES_FILE = 'services.yaml';

    private static string $configDir = '';

    public function getNiceName(): string
    {
        return 'TinyMce Bundle';

    }

    public function getDescription(): string
    {
        return '';
    }


    public function getContainerExtension(): ExtensionInterface
    {
        return new TinyMceExtension(
            self::configDir(),
            self::servicesFile()
        );
    }

    protected function getComposerPackageName(): string
    {
        // getVersion() will use this name to read the version from
        // PackageVersions and return a normalized value
        return 'bitbirddev/tinymce-bundle';
    }



    protected function getContainerExtensionClass(): string
    {
        return TinyMceExtension::class;
    }

    public function getPath(): string
    {
        if (!$this->path) {
            $this->path = dirname(__DIR__);
        }

        return $this->path;
    }

    public static function configDir(): string
    {
        if (!self::$configDir) {
            self::$configDir = realpath(
                dirname(__DIR__) . self::CONFIG_DIR
            );
        }

        return self::$configDir;
    }

    public static function servicesFile(): string
    {
        return self::SERVICES_FILE;
    }
}
