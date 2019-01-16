<?php

namespace Napoleon\Commander\Commands\Docker;

use Napoleon\Commander\Terminal;
use Napoleon\Commander\Helpers\Console;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Container extends Command
{
    protected static $defaultName = 'container:new';

    public function configure()
    {
        $this->setDescription('Create a new compose file to start with')
             ->addArgument('name', InputArgument::REQUIRED, 'File name of your docker-compose');
    }

    /**
     * Contains the commands to be executes
     *
     * @param  InputInterface  $input  [description]
     * @param  OutputInterface $output [description]
     * @return void
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $container_name = $input->getArgument('name');
        Terminal::run("mkdir " . docker_root() . "/" . $container_name);

        Console::displayTable("ls " . docker_root(), function ($data) use ($output) {
            $table = new Table($output);

            return $table->setHeaders(['', 'Folders'])->setRows($data)->render();
        });
    }
}
