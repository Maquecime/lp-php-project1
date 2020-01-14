<?php
/**
 * Created by PhpStorm.
 * User: madatin
 * Date: 14/01/20
 * Time: 09:14
 */

namespace App\Command;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class MyNewCommand extends Command
{
    protected function configure()
    {
        $this->setName("mycommand:writepeople");
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $configDirectories = [__DIR__.'/../../'];

        $fileLocator = new FileLocator($configDirectories);
        $yamlUserFiles = $fileLocator->locate('listPersonne.yml', null, false);
        $users = Yaml::parseFile($yamlUserFiles[0]);
        foreach ($users['personnes'] as $personne) {
            print $personne . "\xA";
        }
    }


}