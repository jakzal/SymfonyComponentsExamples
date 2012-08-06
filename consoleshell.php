<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console as Console;

$application = new Console\Application('Demo', '1.0.0');
$application->add(new PSS\Command\HelloWorldCommand('hello-world'));

$shell = new Console\Shell($application);
$shell->run();
