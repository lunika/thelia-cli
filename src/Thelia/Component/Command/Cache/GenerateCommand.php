<?php

namespace Thelia\Component\Command\Cache;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class GenerateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('cache:generate')
            ->setDescription('Generate cache')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $dir = THELIA_ROOT . '/client/cache/parseur/';
        \Analyse::cleanup_cache($this->cache_dir, 1);
        $output->writeln(sprintf('Examine the cache for the <info>%s</info>', $dir));

    }
}