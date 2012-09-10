<?php

if ( version_compare( PHP_VERSION, '5.3.0', '<' ) ) {
        printf( "Error: Thelia CLI requires PHP %s or newer. You are running version %s.\n", '5.3.0', PHP_VERSION );
        die(-1);
}

define( 'THELIA_CLI_ROOT', __DIR__ . '/' );
define( 'THELIA_ROOT', $_SERVER['PWD']);
define( 'THELIA_CLI_VERSION', '0.1' );
$sortie = false;
include THELIA_ROOT . '/fonctions/moteur.php';


function thelia_cli_autoload($class)
{
    if($class == 'Variable') {

    } else if (strpos($class, 'Thelia')  === false) {
        include THELIA_CLI_ROOT . '../../vendor/' . str_replace(array('_', '\\'), '/', $class) . '.php';
    }
    else {
        include THELIA_CLI_ROOT .'../' . str_replace(array('_', '\\'), '/', $class) . '.php';
    }
}

spl_autoload_register('thelia_cli_autoload');

include __DIR__ . '/Shell.php';
