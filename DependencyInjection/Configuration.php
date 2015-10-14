<?php

namespace Bitverse\IdenticonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $root = $builder->root('identicon');

        $root
            ->children()
                ->variableNode('preprocessor')
                    ->defaultValue('Bitverse\Identicon\Preprocessor\MD5Preprocessor')
                ->end()
                ->variableNode('generator')
                    ->defaultValue('Bitverse\Identicon\Generator\PixelsGenerator')
                ->end()
            ->end();

        return $builder;
    }
}
