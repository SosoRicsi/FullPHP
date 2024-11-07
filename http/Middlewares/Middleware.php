<?php

declare(strict_types=1);

namespace App\Middlewares;

class Middleware
{

	public function handle(\Aurora\Http\Request $request, \Aurora\Http\Response $response)
	{
		if ($request->isMethod('GET')) {
			return true;
		}

		$response->setStatusCode(400)
				->setBody("Wrong method!")
				->addHeader('Content-Type', 'application/json')
				->send();
	}

}