<?php

declare(strict_types=1);

namespace App\Middlewares;

class ApiSecretKey
{

	public function handle(\ApiPHP\Http\Request $request, \ApiPHP\Http\Response $response)
	{
		if ($request->getHeader('API_SECRET_KEY') === env('SECRET_KEY')) {
			return true;
		}

		$response->setStatusCode(403)
				->setBody("wrong_api_key")
				->send();
	}

}