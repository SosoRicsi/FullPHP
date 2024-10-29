<?php

use ApiPHP\Additionals\Collection;
use ApiPHP\App;
use SosoRicsi\JWT\JWT;
use ApiPHP\Http\Request;
use ApiPHP\Http\Response;
use ApiPHP\Http\Router;
use App\Controllers\UserController;
use App\Middlewares\Middleware;
use App\Middlewares\ApiSecretKey;

$router = App::router();

$router->get('/test', [UserController::class, 'call']);
$router->setVersion("1");

$router->version(function () use ($router) {
	$router->get('/test', [UserController::class, 'index']);

	$router->get('/create', function (Request $request, Response $response) {
		$response->setStatusCode(200)
			->setBody(JWT::encode(['username' => "SosoRicsi"]))
			->send();
	});

	$router->get('/index', function (Request $request, Response $response) {
		$payload = collect(JWT::decode($request->getBody('payload')));

		$response->setStatusCode(200)
			->addHeader('Content-Type', 'application/json')
			->setBody($payload->all())
			->send();
	}, [Middleware::class]);
}, [ApiSecretKey::class]);

$router->run();