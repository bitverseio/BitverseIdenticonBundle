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
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->variableNode('generator')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
            ->end();

        return $builder;
    }
}
