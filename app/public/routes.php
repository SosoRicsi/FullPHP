<?php

use SosoRicsi\JWT\JWT;
use ApiPHP\Http\Request;
use ApiPHP\Http\Response;
use App\Middlewares\Middleware;
use App\Middlewares\ApiSecretKey;


$router->group('/api', [ApiSecretKey::class], function () use ($router) {
	$router->get('/create', function (Request $request, Response $response) {
		$response->setStatusCode(200)
			->setBody(JWT::encode(['username' => "SosoRicsi"]))
			->send();
	});

	$router->get('/', function (Request $request, Response $response) {
		$response->setStatusCode(200)
			->setBody(JWT::decode($request->getBody('payload')))
			->send();
	}, [Middleware::class]);
});
