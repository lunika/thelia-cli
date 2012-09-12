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
        $theliaVersion = \Variable::lire("version");
        $output->writeln(substr($theliaVersion, 0, 1) . "." . substr($theliaVersion, 1, 1) . "." . substr($theliaVersion, 2, 1));
    }
}