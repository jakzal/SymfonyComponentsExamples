<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Dumper\XmlDumper;

/**
 * Defining services
 */

$serviceContainer = new ContainerBuilder();

$clientDefinition = new Definition('Buzz\Client\Curl');
$clientDefinition->addMethodCall('setTimeout', array(15));
$serviceContainer->setDefinition('browser.client', $clientDefinition);

$browserDefinition = new Definition('Buzz\Browser', array(new Reference('browser.client')));
$serviceContainer->setDefinition('browser', $browserDefinition);

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

echo "Services dumped to XML:\n";
$dumper = new XmlDumper($serviceContainer);
echo $dumper->dump();
