<?php

namespace Napoleon\Commander\Docker\Facade;

use Symfony\Component\Process\Process;

class DockerInitializer
{
    /**
     * Hitting the command
     *
     * @param  String $command Command to be execute
     * @return void
     */
    public function start($command)
    {
        $process = new Process($command);

        $process->run();

        if(! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
