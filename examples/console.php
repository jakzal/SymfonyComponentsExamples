<?php

require_once __DIR__.'/../vendor/autoload.php';

use PSS\Command\HelloWorldCommand;
use Symfony\Component\Console\Application;

$application = new Application('Demo', '1.0.0');
$application->add(new HelloWorldCommand('hello-world'));
$application->run();
