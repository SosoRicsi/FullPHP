<?php

require __DIR__ . '/../vendor/autoload.php';

use ApiPHP\Http\Router;
use SosoRicsi\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../')->load();

JWT::setKey(env('SECRET_KEY'));

$router = new Router;

require __DIR__ . '/app/web/routes.php';

$router->run();
