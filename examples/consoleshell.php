<?php

require_once __DIR__.'/../vendor/autoload.php';

use PSS\Command\HelloWorldCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Shell;

$application = new Application('Demo', '1.0.0');
$application->add(new HelloWorldCommand('hello-world'));

$shell = new Shell($application);
$shell->run();
