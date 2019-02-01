<?php

namespace Napoleon\Commander\Commands\Container;

use Napoleon\Commander\Helpers\Console;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListContainer extends Command
{
    protected static $defaultName = 'container:list';

    public function configure()
    {
        $this->setDescription('List of containers');
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
        Console::displayTable("ls " . docker_root(), function ($data) use ($output) {
            $table = new Table($output);

            return $table->setHeaders(['', 'Folders'])->setRows($data)->render();
        });
    }
}
