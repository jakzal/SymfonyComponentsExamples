<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\Config\FileLocator;

/**
 * Loading services defined in config/buzz.xml
 */

$serviceContainer = new ContainerBuilder();
$loader = new XmlFileLoader($serviceContainer, new FileLocator(__DIR__.'/../config'));
$loader->load('buzz.xml');

/**
 * Dumping services
 */

echo "Services dumped to PHP:\n";
$dumper = new PhpDumper($serviceContainer);
echo $dumper->dump();
