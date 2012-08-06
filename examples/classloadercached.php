<?php

require_once __DIR__.'/../vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';
require_once __DIR__.'/../vendor/symfony/class-loader/Symfony/Component/ClassLoader/ApcUniversalClassLoader.php';

use Acme\Tools\HelloWorld;
use Symfony\Component\ClassLoader\ApcUniversalClassLoader;

$loader = new ApcUniversalClassLoader('ClassLoader');
$loader->registerNamespaces(array('Acme' => __DIR__.'/../src'));
$loader->registerPrefixes(array('Legacy_' => __DIR__.'/../src'));
$loader->register();

$helloWorld = new HelloWorld();
$legacyHelloWorld = new Legacy_Acme_Tools_HelloWorld();
