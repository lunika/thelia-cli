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

$loader = require_once __DIR__ . "/../../vendor/autoload.php";


function thelia_cli_autoload($class)
{
    if (in_array($class, array('Variable', 'ActionsAdminModules'))) {

        switch($class)
        {
            case 'ActionsAdminModules';

                    $dirAdmin = null;
                    $dirIterator = new RecursiveDirectoryIterator(THELIA_ROOT);
                    $iterator = new RecursiveIteratorIterator($dirIterator, RecursiveIteratorIterator::SELF_FIRST);
                    $Regex = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

                    foreach ($Regex as $file) {
                        $filename = str_replace(THELIA_ROOT . '/', '', $file[0]);
                        $pathinfo = pathinfo($filename);
                        if($pathinfo['basename'] == 'accueil.php'){
                            $dirAdmin =  $pathinfo['dirname'];
                        }
                    }
                    include(THELIA_ROOT . '/'. $dirAdmin. '/actions/ActionsAdminModules.class.php');
                break;
        }

    }
}

spl_autoload_register('thelia_cli_autoload');

include __DIR__ . '/Component/Console/Shell.php';
