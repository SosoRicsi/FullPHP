<?php

declare(strict_types=1);

namespace App\Middlewares;

class Middleware
{

	public function handle(\ApiPHP\Http\Request $request, \ApiPHP\Http\Response $response)
	{
		if ($request->isMethod('GET')) {
			return true;
		}

		return false;
	}

}