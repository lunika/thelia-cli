<?php

namespace Thelia\Component\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CacheCommand extends Command
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

        if ($dh = opendir($dir)) {
            while ($file = readdir($dh))
            {
                if ($file == '.' || $file == '..') continue;

                unlink($this->$dir . '/' . $file);
            }
        }

    }
}