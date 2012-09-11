<?php

use Symfony\Component\Console\Application;
use Thelia\Component\Console\CoreCommand;
use Thelia\Component\Console\PluginCommand;
use Thelia\Component\Console\CacheCommand;

if ( PHP_SAPI !== 'cli' ) {
    echo "Only CLI access.\n";
    die(-1);
}

$console = new Application();
$console->add(new CoreCommand);
$console->add(new PluginCommand);
$console->add(new CacheCommand);
$console->run();