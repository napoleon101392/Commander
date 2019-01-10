<?php

namespace Napoleon\Commander;

use Symfony\Component\Console\Application;

class App
{
    public static function fire()
    {
        $app = new Application;
        $commands = config('commands');

        foreach ($commands as $command) {
            $app->add(new $command);
        }

        $app->run();
    }
}
