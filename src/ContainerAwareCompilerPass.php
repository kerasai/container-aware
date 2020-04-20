<?php

namespace Kerasai\ContainerAware;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ContainerAwareCompilerPass.
 */
class ContainerAwareCompilerPass implements CompilerPassInterface {

  /**
   * {@inheritdoc}
   */
  public function process(ContainerBuilder $container) {
    foreach ($container->getDefinitions() as $definition) {
      if (is_subclass_of($definition->getClass(), ContainerAwareInterface::class)) {
        $definition->addMethodCall('setContainer', [new Reference('service_container')]);
      }
    }
  }

}
