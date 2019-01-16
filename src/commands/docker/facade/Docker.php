<?php

namespace Napoleon\Commander\Docker\Facade;

use Napoleon\Commander\Contracts\DockerInterface;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class Docker implements DockerInterface
{
    /**
     * Hitting the command
     *
     * @param  String $command Command to be execute
     * @return void
     */
    public static function run($command)
    {
        $process = new Process($command);

        $process->run(function ($type, $buffer) use ($command) {
            $trials = 0;

            if (Process::ERR === $type) {
                while ($trials < 3) {
                    $trials++;

                    (new Process($command))->run();
                }
            }
        });

        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
