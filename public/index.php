<?php

require __DIR__.'/../vendor/autoload.php';

use SosoRicsi\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../')->load();

JWT::setKey(env('SECRET_KEY'));