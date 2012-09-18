<?php

namespace Thelia\Component\Command\Core;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class VersionCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('core:version')
            ->setDescription('Thelia core')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(rtrim(preg_replace("/(.)/", "$1.", \Variable::lire("version")), "."));
    }
}