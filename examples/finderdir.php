<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;

$components = Finder::create()
    ->directories()
    ->depth(0)
    ->in('vendor/symfony');

echo "Installed Symfony components:\n";
foreach ($components as $dir) {
    printf("* %s \n", $dir->getFilename());
}
