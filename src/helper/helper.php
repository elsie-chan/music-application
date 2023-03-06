<?php
$env_path = dirname($_SERVER['PHP_SELF'], 2) . '/.env';
$dotenv->load(dirname(__DIR__, 2).'/.env');
function env($key = null) :array|string
{
    return $key ? $_ENV[$key] : $_ENV;
}

function assets($path = ''): string
{
    $root = dirname(__DIR__);

    if (file_exists($root . '/' . $path)) {
        return $root . '/' . $path;
    } else {
        return $root . '/' . $path;
    }
}

function clean_array($array = array()) : array
{
    return array_filter($array, fn($value) => !is_null($value) && $value !== '');
}
