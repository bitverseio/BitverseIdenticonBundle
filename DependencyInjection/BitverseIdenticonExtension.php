<?php

namespace Bitverse\IdenticonBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

class BitverseIdenticonExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->precessConfiguration($configuration, $configs);

        $loader = new XMLFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        foreach (['preprocessor', 'generator'] as $key) {
            $container->setParameter('identicon.' . $key, $config[$key]);
        }

        $loader->load('config.xml');
    }
}
