<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\GraphvizDumper;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Loading services defined in config/buzz.xml
 */

$serviceContainer = new ContainerBuilder();
$loader = new XmlFileLoader($serviceContainer, new FileLocator(__DIR__.'/config'));
$loader->load('buzz.xml');

/**
 * Dumping services to graphviz
 * Save the output to a services.dot file and generate a graph with: dot -Tpng -o services.png services.dot
 */

$dumper = new GraphvizDumper($serviceContainer);
echo $dumper->dump();
