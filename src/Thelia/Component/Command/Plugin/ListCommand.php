<?php

namespace Thelia\Component\Command\Plugin;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ListCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('plugin:list')
            ->setDescription('Liste tous les plugins disponibles')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $liste = \ActionsAdminModules::instance()->lister(false, true);
        foreach($liste as $plugin){
            $titre = \ActionsAdminModules::instance()->lire_titre_module($plugin);

            $output->writeln(sprintf("%s => %s", $titre, ($plugin->actif)?"Actif":"désactivé"));
        }
    }
}