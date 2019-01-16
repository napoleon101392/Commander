<?php

require 'vendor/autoload.php';

/**
 * Loads other packages on the app
 */
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

/**
 * --------------------------------------------------
 * FIRRING OF THE APPLICATION
 * --------------------------------------------------
 *
 * The lists of commands
 * That are up and running
 *
 */
\Napoleon\Commander\App::fire();
