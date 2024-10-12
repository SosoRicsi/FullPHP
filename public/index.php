<?php

require __DIR__.'/../vendor/autoload.php';

use SosoRicsi\JWT\JWT;
use ApiPHP\Http\Request;
use ApiPHP\Http\Response;
use ApiPHP\Http\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../')->load();

JWT::setKey(env('SECRET_KEY'));

$router = new Router;

$router->get('/', function (Request $request, Response $response) {
	$response->setStatusCode(200)
			->setBody("Szia")
			->send();
});

$router->run();