<?php

namespace Thelia\Component\Command\Plugin;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class DownloadCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('plugin:download')
            ->setDescription('Gestion plugin')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $download = $input->getArgument('download');

        $dir = THELIA_ROOT . '/client/cache/plugin/';
        $file = sprintf('http://thelia.net/IMG/plugins_thelia/%s.zip', $download);
        $output->writeln( 'Downloading install package from ' .  $file);
        @mkdir($dir, 0777);

        if ($copy = copy($file, $this->cache . $download . '.zip')) {
            $output->writeln(sprintf('<info>La copie "%s" du fichier a réalisé.</info>', $file));
        } else {
            $output->writeln(sprintf('<error>La copie "%s" du fichier a échoué.</error>', $file));
        }
    }
}