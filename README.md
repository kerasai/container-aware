# Container Aware

This package adds utilities for making code "container aware".

## Usage

To build a service container and automatically inject the container to all 
container aware services:

```php
<?php

use Kerasai\ContainerAware\ContainerAwareCompilerPass;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$containerBuilder = new ContainerBuilder();
$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__));
$loader->load('services.yml');
$containerBuilder->addCompilerPass(new ContainerAwareCompilerPass());
$containerBuilder->compile();
```

And on your services, implement the 
`\Symfony\Component\DependencyInjection\ContainerAwareInterface` interface. 
Also use `\Symfony\Component\DependencyInjection\ContainerAwareTrait` to easily
implement the interface.
