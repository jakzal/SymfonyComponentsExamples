<?php

require_once __DIR__.'/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';
require_once __DIR__.'/src/Symfony/Component/ClassLoader/ApcUniversalClassLoader.php';

$loader = new Symfony\Component\ClassLoader\ApcUniversalClassLoader('ClassLoader');
$loader->registerNamespaces(array('Acme' => __DIR__ . '/src'));
$loader->registerPrefixes(array('Legacy_' => __DIR__ . '/src'));
$loader->register();

$helloWorld = new Acme\Tools\HelloWorld();
$legacyHelloWorld = new Legacy_Acme_Tools_HelloWorld();

