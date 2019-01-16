<?php

namespace Napoleon\Commander\Commands\Docker;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Napoleon\Commander\Docker\Facade\Docker;

class Start extends Command
{
    /**
     * Command to be trigger
     *
     * @var string
     */
    protected static $defaultName = 'docker:start';

    /**
     * Place where description, details and helps
     *
     * @return void
     */
    public function configure()
    {
        $this->setDescription('Starting all docker containers');
    }

    /**
     * @todo  : Remove the message text,
     *        and display containers in tabular form
     *        : Iterate the process once it fails
     *
     * Contains the commands to be executes
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            "Starting docker containers ...",
            "============================="
        ]);

        foreach (config('containers') as $container => $commands) {
            Docker::run("docker start {$container}");

            foreach ($commands as $command) {
                Docker::run("docker exec {$container} {$command}");
            }
        }

        $output->writeln([
            "=============================",
            "Docker started"
        ]);
    }
}
