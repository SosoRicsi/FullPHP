<?php

require __DIR__.'/../../vendor/autoload.php';

use ApiPHP\Http\Router;
use SosoRicsi\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../')->load();

JWT::setKey(env('SECRET_KEY'));
date_default_timezone_set(env('TIMEZONE'));

$router = new Router;

require __DIR__ . '/routes.php';

$router->run();