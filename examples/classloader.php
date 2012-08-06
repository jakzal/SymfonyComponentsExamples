<?php

require_once __DIR__.'/../vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Acme\Tools\HelloWorld;
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array('Acme' => __DIR__.'/../src'));
$loader->registerPrefixes(array('Legacy_' => __DIR__.'/../src'));
$loader->register();

$helloWorld = new HelloWorld();
$legacyHelloWorld = new Legacy_Acme_Tools_HelloWorld();
