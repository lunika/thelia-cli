<?php

namespace Thelia\Component\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CoreCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('core:version')
            ->setDescription('Greet someone')
            ->addArgument('version', InputArgument::OPTIONAL, 'Who do you want to greet?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $version = $input->getArgument('version');
        if ($version) {
            $theliaVersion = \Variable::lire("version");
            $output->writeln(substr($theliaVersion, 0, 1) . "." . substr($theliaVersion, 1, 1) . "." . substr($theliaVersion, 2, 1));
        }
    }
}