<?php

require __DIR__ . '/vendor/autoload.php';

use ApiPHP\App;
use ApiPHP\Http\Router;
use SosoRicsi\JWT\JWT;

Dotenv\Dotenv::createImmutable(__DIR__)->load();

JWT::setKey(env('SECRET_KEY'));
date_default_timezone_set(env('TIMEZONE'));

App::setContainer(new \ApiPHP\Container);
App::setRouter(new Router);

require __DIR__ . '/web/routes.php';
require __DIR__ . '/web/bootstrap.php';

App::container('Data');