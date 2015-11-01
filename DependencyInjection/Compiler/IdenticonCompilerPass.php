<?php

namespace Bitverse\IdenticonBundle\DependencyInjection\Compiler;

use Bitverse\Identicon\Color\Color;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class IdenticonCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (
            !$container->has('bitverse.identicon') ||
            !$container->hasParameter('bitverse_identicon.generator.background_color')
        ) {
            return;
        }

        $definition = $container->findDefinition('bitverse.identicon');

        $definition->addMethodCall(
            'setBackgroundColor',
            [
                $container->getParameter(
                    'bitverse_identicon.generator.background_color'
                )
            ]
        );
    }
}
