<?php

namespace Napoleon\Commander;

use Napoleon\Commander\Contracts\DockerInterface;
use Napoleon\Commander\Exceptions\DockerComposeFileException;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Terminal implements DockerInterface
{
    public static function run($command)
    {
        $process = new Process($command);

        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                throw new DockerComposeFileException('File exists');
            }
        });

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
