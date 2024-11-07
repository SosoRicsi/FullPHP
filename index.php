<?php

require __DIR__ . '/vendor/autoload.php';

use Aurora\App;
use Aurora\Http\Router;
use SosoRicsi\JWT\JWT;

Dotenv\Dotenv::createImmutable(__DIR__)->load();

JWT::setKey(env('SECRET_KEY'));
date_default_timezone_set(env('TIMEZONE'));

App::setContainer(new \Aurora\Container);
App::setRouter(new Router);

require web('routes.php');
require web('bootstrap.php');