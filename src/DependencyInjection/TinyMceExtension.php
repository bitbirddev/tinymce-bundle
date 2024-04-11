<?php

declare(strict_types=1);

namespace bitbirddev\TinyMceBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class TinyMceExtension extends Extension
{
    public function __construct(
    ) {
    }

    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {

        (new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../config')
        ))
            ->load('services.yaml')
        ;
    }
}
