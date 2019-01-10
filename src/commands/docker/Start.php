<?php

namespace Napoleon\Commander\Commands\Docker;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Napoleon\Commander\Docker\Facade\DockerInitializer;

class Start extends Command
{
    protected static $defaultName = 'docker:start';

    public function configure()
    {
        $this->setDescription('Starting all docker containers');

        $this->setHelp('Help description');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            "Starting docker containers ...",
            "============================="
        ]);

        DockerInitializer::start('docker start $(docker ps -aq)');

        $output->writeln([
            "=============================",
            "Docker started"
        ]);
    }
}
