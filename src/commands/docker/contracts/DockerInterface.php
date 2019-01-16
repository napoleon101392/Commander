<?php

namespace Napoleon\Commander\Contracts;

interface DockerInterface
{
    public static function run($command);
}
