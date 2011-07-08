<?php

require_once __DIR__.'/src/autoload.php';

use Symfony\Component\Finder as Finder;

$files = Finder\Finder::create()
    ->files()
    ->name('/^He.+Command.php$/')
    ->size('<4k')
    ->date('until yesterday')
    ->sortByName()
    ->in('.');

echo "Command files starting with 'He' below 4k modified until yesterday:\n";
foreach ($files as $file) {
    printf("* %s %s\n", $file->getFilename(), date('Y-m-d H:i', $file->getMTime()));
}

