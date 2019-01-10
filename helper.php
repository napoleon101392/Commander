<?php

if (! function_exists("dd")) {
    function dd($data) {
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
