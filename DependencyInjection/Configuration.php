<?php

namespace Bitverse\IdenticonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $root = $builder->root('bitverse_identicon');

        $root
            ->children()
                ->arrayNode('preprocessor')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->variableNode('class')
                            ->defaultValue('Bitverse\Identicon\Preprocessor\MD5Preprocessor')
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('generator')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->variableNode('class')
                            ->defaultValue('Bitverse\Identicon\Generator\PixelsGenerator')
                        ->end()
                        ->variableNode('background_color')
                            ->defaultValue('#EEEEEE')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $builder;
    }
}
