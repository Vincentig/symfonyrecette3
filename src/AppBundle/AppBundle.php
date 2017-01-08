<?php

namespace AppBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AppBundle
 *
 * @package AppBundle
 */
class AppBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // With Yaml configuration format
        $container->addCompilerPass(DoctrineOrmMappingsPass::createYamlMappingDriver(array(
            realpath(__DIR__ . '/Resources/config/doctrine-mapping') => 'AppBundle\Model'
        )));

        // With annotation configuration format

        $namespaces = array( 'AppBundle\Model' );
        $directories = array( realpath(__DIR__.'/Model') );

        $container->addCompilerPass(DoctrineOrmMappingsPass::createAnnotationMappingDriver(
            $namespaces,
            $directories
        ));
    }
}
