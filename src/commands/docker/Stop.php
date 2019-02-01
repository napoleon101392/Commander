<?php

namespace Napoleon\Commander\Commands\Docker;

use Napoleon\Commander\Docker\Facade\Docker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Stop extends Command
{
    /**
     * Command to be trigger
     *
     * @var string
     */
    protected static $defaultName = 'docker:stop';

    /**
     * Place where description, details and helps
     *
     * @return void
     */
    public function configure()
    {
        $this->setDescription('It shutdown all running docker containers');
    }

    /**
     * @todo  Remove the message text,
     *        and display containers in tabular form
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
            "Shuting down containers ... ",
            "=============================",
        ]);

        foreach (config('containers') as $container => $commands) {
            Docker::run("docker stop {$container}");
        }

        $output->writeln([
            "==============================",
            "Successfully stopped all containers",
        ]);
    }
}
