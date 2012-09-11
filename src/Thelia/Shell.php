<?php

use Symfony\Component\Console\Application;
use Thelia\Component\Console\Command\CoreCommand;
use Thelia\Component\Console\Command\PluginCommand;
use Thelia\Component\Console\Command\CacheCommand;

if ( PHP_SAPI !== 'cli' ) {
    echo "Only CLI access.\n";
    die(-1);
}

$console = new Application();
$console->add(new CoreCommand);
$console->add(new PluginCommand);
$console->add(new CacheCommand);
$console->run();