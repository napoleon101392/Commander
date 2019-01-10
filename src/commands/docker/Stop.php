<?php

namespace Napoleon\Commander\Commands\Docker;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Napoleon\Commander\Docker\Facade\DockerInitializer;

class Stop extends Command
{
    protected static $defaultName = 'docker:stop';

    public function configure()
    {
        $this->setDescription('It will shutdown all running docker containers');

        $this->setHelp('This will shutdown all the containers running');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            "Shuting down containers ... ",
            "============================="
        ]);

        DockerInitializer::start('docker stop $(docker ps -aq)');

        $output->writeln([
            "==============================",
            "Successfully stopped all containers"
        ]);
    }
}
