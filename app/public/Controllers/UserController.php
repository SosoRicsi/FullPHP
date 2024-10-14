<?php declare(strict_types=1);

namespace App\Controllers;

use ApiPHP\Http\Request;
use ApiPHP\Http\Response;
use App\database\Models\User;
use SosoRicsi\JWT\JWT;

class UserController
{

	protected $model = User::class;

	public function index(Request $request, Response $response)
	{
		$response->setStatusCode(200)
			->addHeader("Content-Type", "application/json")
			->setBody(
				JWT::decode($request->getBody('payload'))
			)
			->send();
	}

}