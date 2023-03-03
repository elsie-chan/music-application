<?php
$env_path = dirname($_SERVER['PHP_SELF'], 2) . '/.env';

$dotenv->load(dirname(__DIR__, 2).'/.env');
function env($key = null):array {
    return $key ? $_ENV[$key]: array();
}

function assets($path = ''): string {
    $root = dirname(__DIR__);
    if (file_exists($root . '/' . $path)) {
        return $root . '/' . $path;
    } else {
        return $root . '/' . $path;
    }
}