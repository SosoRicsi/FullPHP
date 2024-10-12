<?php

declare(strict_types=1);

namespace App\Middlewares;

class Middleware
{

	public function handle(\ApiPHP\Http\Request $request, \ApiPHP\Http\Response $response)
	{
		if ($request->isMethod('POST')) {
			return true;
		}

		$response->setStatusCode(400)
				->setBody("Wrong method!")
				->addHeader('Content-Type', 'application/json')
				->send();
	}

}