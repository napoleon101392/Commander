<?php

if (! function_exists("dd")) {
    function dd($data)
    {
        return dump($data);
    }
}

if (! function_exists("config")) {
    function config($path)
    {
        $data = include_once(__DIR__ . "/src/config/{$path}.php");

        return $data;
    }
}

if (! function_exists('containers')) {
    function containers()
    {
        $containers = json_decode(json_encode(json_decode(file_get_contents("containers.json"), true)), FALSE);

        return $containers;
    }
}

if (! function_exists('docker_root')) {
    function docker_root()
    {
        return $_ENV['DOCKER_ROOT_DIR'];
    }
}
