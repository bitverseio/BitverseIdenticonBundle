<?php

namespace Bitverse\IdenticonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class BitverseIdenticonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('config.yml');

        $container->setParameter(
            'bitverse_identicon.preprocessor.class',
            $config['preprocessor']['class']
        );

        $container->setParameter(
            'bitverse_identicon.generator.class',
            $config['generator']['class']
        );

        $container->setParameter(
            'bitverse_identicon.generator.background_color',
            $config['generator']['background_color']
        );
    }
}
