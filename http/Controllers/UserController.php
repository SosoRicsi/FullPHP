<?php declare(strict_types=1);

namespace App\Controllers;

use ApiPHP\Additionals\Collection;
use ApiPHP\Http\Request;
use ApiPHP\Http\Response;
use App\database\Models\User;
use SosoRicsi\JWT\JWT;

class UserController
{

	protected $model = User::class;

	public function index(Request $request, Response $response)
	{
		$collection = new Collection(JWT::decode($request->getBody('payload')));

		$response->setStatusCode(200)
			->addHeader("Content-Type", "application/text")
			->setBody(
				JWT::encode([$collection->username])
			)
			->send();
	}

	public function call()
	{
		if (true != false) {
			print true;
		}
	}

}