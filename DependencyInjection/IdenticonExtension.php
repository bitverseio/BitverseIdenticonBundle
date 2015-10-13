<?php

namespace Bitverse\IdenticonBundle\DependencyInjection;

class IdenticonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('config.yml');
    }
}
