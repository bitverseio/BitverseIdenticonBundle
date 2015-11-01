<?php

namespace Bitverse\IdenticonBundle\Tests\DependencyInjection\Compiler;

use Bitverse\Identicon\Color\Color;
use Bitverse\IdenticonBundle\DependencyInjection\Compiler\IdenticonCompilerPass;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractCompilerPassTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class IdenticonCompilerPassTest extends AbstractCompilerPassTestCase
{
    /**
     * @test
     */
    public function processTest()
    {
        $this->setDefinition('bitverse.identicon.generator', new Definition());

        $this->setParameter(
            'bitverse_identicon.generator.background_color',
            '#444444'
        );

        $this->compile();

        $this->assertContainerBuilderHasServiceDefinitionWithMethodCall(
            'bitverse.identicon.generator',
            'setBackgroundColor',
            ['#444444']
        );
    }

    protected function registerCompilerPass(ContainerBuilder $container)
    {
        $container->addCompilerPass(new IdenticonCompilerPass());
    }
}
