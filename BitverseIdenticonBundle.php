<?php

namespace Bitverse\IdenticonBundle;

use Bitverse\IdenticonBundle\DependencyInjection\Compiler\IdenticonCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class BitverseIdenticonBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new IdenticonCompilerPass());
    }
}
