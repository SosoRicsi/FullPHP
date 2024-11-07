<?php

use Aurora\App;
use SosoRicsi\JWT\JWT;
use Aurora\Http\Request;
use Aurora\Http\Response;
use App\Controllers\UserController;
use App\Middlewares\Middleware;
use App\Middlewares\ApiSecretKey;
use Aurora\Additionals\Collection;

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
		$payload = new Collection(JWT::decode($request->getBody('payload')));

		print "<pre>";
		print_r($payload);
	}, [Middleware::class]);
}, [ApiSecretKey::class]);

$router->run();