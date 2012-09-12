<?php

namespace Thelia\Component\Command\Cache;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ClearCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('cache:clear')
            ->setDescription('Clear cache')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $dir = THELIA_ROOT . '/client/cache/parseur/';

        $output->writeln(sprintf('Clearing the cache for the <info>%s</info>', $dir));
        if ($dh = opendir($dir)) {
            while ($file = readdir($dh))
            {
                if ($file == '.' || $file == '..') continue;

                unlink($dir . '/' . $file);
            }
        }

    }
}