<?php

use Symfony\Component\Console\Application;

if ( PHP_SAPI !== 'cli' ) {
    echo "Only CLI access.\n";
    die(-1);
}

$console = new Application();
$console->add(new \Thelia\Component\Command\Core\VersionCommand);

// Plugin
$console->add(new \Thelia\Component\Command\Plugin\DownloadCommand);
$console->add(new \Thelia\Component\Command\Plugin\ActivateCommand);
$console->add(new \Thelia\Component\Command\Plugin\DesactivateCommand);
$console->add(new \Thelia\Component\Command\Plugin\ListCommand);

// Cache
$console->add(new \Thelia\Component\Command\Cache\ClearCommand);
$console->add(new \Thelia\Component\Command\Cache\GenerateCommand );
$console->run();