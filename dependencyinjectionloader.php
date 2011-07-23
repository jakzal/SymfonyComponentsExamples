<?php

require_once __DIR__.'/src/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\Config\FileLocator;

/**
 * Loading services
 */

$serviceContainer = new ContainerBuilder();
$loader = new XmlFileLoader($serviceContainer, new FileLocator(__DIR__.'/config'));
$loader->load('buzz.xml');

/**
 * Using services
 */

$browser = $serviceContainer->get('browser');
$dom = $browser->get('http://www.google.com/')->toDomDocument();

printf('Browser: %s'."\n", get_class($browser));
printf('Client: %s'."\n", get_class($browser->getClient()));
printf('Client timeout: %d'."\n", $browser->getClient()->getTimeout());
printf('Response title: %s'."\n", $dom->getElementsByTagName('title')->item(0)->nodeValue);

/**
 * Dumping services
 */

echo "Services dumped to PHP:\n";
$dumper = new PhpDumper($serviceContainer);
echo $dumper->dump();
