<?php
namespace Thelia\Component\Command\Plugin;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command {
    protected function configure()
    {
        $this
            ->setName('plugin:generate')
            ->setDescription('génère un nouveau plugin')
            ->addArgument('name', InputArgument::REQUIRED,"Nom du plugin à générer")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $nom = $input->getArgument('name');
        
        $pluginDirectory = THELIA_ROOT . '/client/plugins/';
        
        if(is_writable($pluginDirectory) === false){
            $output->writeln("Impossible d'écrire dans le répertoire client/plugins. Merci de vérifier les droits de ce répertoire");
            exit;
        }
        
        if(file_exists($pluginDirectory.$nom)){
            $output->writeln('Le plugin '.$nom.' existe déjà');
            exit;
        }
        
        if(mkdir($pluginDirectory.$nom)){
            $content = file_get_contents(__DIR__ . '/skeleton/Nomplugin.class.php');
            
            $content = str_replace('%%nomplugin%%',  ucfirst($nom), $content);
            
            file_put_contents($pluginDirectory.$nom.'/'.ucfirst($nom).'.class.php', $content);
            
            $output->writeln('création du plugin '.$nom.' réussie');
        }

        
        
    }
}

?>
