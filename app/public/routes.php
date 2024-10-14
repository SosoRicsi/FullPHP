<?php

use SosoRicsi\JWT\JWT;
use ApiPHP\Http\Request;
use ApiPHP\Http\Response;
use App\Controllers\UserController;
use App\Middlewares\Middleware;
use App\Middlewares\ApiSecretKey;

$router->group('/api', [ApiSecretKey::class], function () use ($router) {
	$router->get('/test', [UserController::class, 'index']);

	$router->get('/create', function (Request $request, Response $response) {
		$response->setStatusCode(200)
			->setBody(JWT::encode(['username' => "SosoRicsi"]))
			->send();
	});

	$router->get('/', function (Request $request, Response $response) {
		$response->setStatusCode(200)
			->addHeader('Content-Type', 'application/json')
			->setBody(date("Y-m-d H:i:s", JWT::decode($request->getBody('payload'))["exp"]))
			->send();
	}, [Middleware::class]);
});
