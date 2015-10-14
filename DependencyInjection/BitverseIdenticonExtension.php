<?php

namespace Bitverse\IdenticonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class BitverseIdenticonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new XMLFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('config.xml');

        foreach (['preprocessor', 'generator'] as $key) {
            $container->setParameter('identicon.' . $key, $config[$key]);
        }
    }
}
