<?php

namespace Kiboko\Bundle\TheFrenchTalentsConnectorBundle\DependencyInjection\CompilerPass;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class FamiliesMappingFileLoaderCompilerPass
    implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('kiboko_tft_connector.family.file_locator')) {
            return;
        }

        $definition = $container->findDefinition(
            'kiboko_tft_connector.family.file_locator'
        );

        $definition->addArgument([$container->getParameter('kernel.root_dir') . '/config/import']);
    }
}
