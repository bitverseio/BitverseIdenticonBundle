<?php

namespace Bitverse\IdenticonBundle\Tests\DependencyInjection;

use Bitverse\IdenticonBundle\DependencyInjection\BitverseIdenticonExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

class BitverseIdenticonExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @test
     * @dataProvider configDataProvider
     */
    public function defaultConfigurationTest($config, $parameters)
    {
        $this->load($config);

        foreach ($parameters as $key => $param) {
            $this->assertContainerBuilderHasParameter($key, $param);
        }

        $this->assertContainerBuilderHasAlias('identicon', 'bitverse.identicon');
    }

    public function configDataProvider()
    {
        return [
            'default' => [
                [],
                [
                    'bitverse_identicon.preprocessor.class' => 'Bitverse\\Identicon\\Preprocessor\\MD5Preprocessor',
                    'bitverse_identicon.generator.class' => 'Bitverse\\Identicon\\Generator\\PixelsGenerator',
                    'bitverse_identicon.generator.background_color' => '#EEEEEE'
                ]
            ],
            'custom generator' => [
                ['generator' => ['class' => 'Bitverse\\Identicon\\Generator\\RingsGenerator']],
                [
                    'bitverse_identicon.preprocessor.class' => 'Bitverse\\Identicon\\Preprocessor\\MD5Preprocessor',
                    'bitverse_identicon.generator.class' => 'Bitverse\\Identicon\\Generator\\RingsGenerator',
                    'bitverse_identicon.generator.background_color' => '#EEEEEE'
                ]
            ],
            'custom background' => [
                ['generator' => ['background_color' => '#000000']],
                [
                    'bitverse_identicon.preprocessor.class' => 'Bitverse\\Identicon\\Preprocessor\\MD5Preprocessor',
                    'bitverse_identicon.generator.class' => 'Bitverse\\Identicon\\Generator\\PixelsGenerator',
                    'bitverse_identicon.generator.background_color' => '#000000'
                ]
            ]
        ];
    }

    protected function getContainerExtensions()
    {
        return [new BitverseIdenticonExtension()];
    }
}
