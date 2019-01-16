<?php

/**
 * --------------------------------------------------
 * COMMAND NAMESPACES
 * --------------------------------------------------
 *
 * The lists of commands
 * That are up and running
 *
 */
return [
    \Napoleon\Commander\Commands\Docker\Start::class,
    \Napoleon\Commander\Commands\Docker\Stop::class,
    \Napoleon\Commander\Commands\Container\NewContainer::class,
    \Napoleon\Commander\Commands\Container\ListContainer::class
];
