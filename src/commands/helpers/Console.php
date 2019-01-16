<?php

namespace Napoleon\Commander\Helpers;

use Closure;
use Symfony\Component\Process\Process;

class Console
{
    const FROM_ZERO = 0;

    const LAST_TWO = -2;

    /**
     * Display the lists of folders on the root directory
     *
     * @param  String  $command
     * @param  Closure $table
     * @return void
     */
    public static function displayTable($command, Closure $table)
    {
        $process = new Process($command);

        $process->run(function ($type, $buffer) use (&$lists) {
            $folders = explode("\n", substr($buffer, self::FROM_ZERO, self::LAST_TWO));

            foreach ($folders as $key => $folder) {
                $lists[] = [$key+1, $folder];
            }
        });

        $table($lists);
    }
}
