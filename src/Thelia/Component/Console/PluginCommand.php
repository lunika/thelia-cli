<?php

namespace Thelia\Component\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class PluginCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('plugin:download')
            ->setDescription('Greet someone')
            ->addArgument('download', InputArgument::OPTIONAL, '')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $download = $input->getArgument('download');
        if ($download) {
            $dir = THELIA_ROOT . '/client/cache/plugin/';
            $file = 'http://thelia.net/IMG/plugins_thelia/'.$download . '.zip';
            $output->writeln( $dir );
            @mkdir($dir, 0777);
            if ($copy = copy($file, $dir . $download . '.zip')) {
                $output->writeln('<info>La copie '.$file.' du fichier a réalisé.</info>');
            } else {
                $output->writeln('<error>La copie '.$file.' du fichier a échoué.</error>');
            }

        }
    }
}