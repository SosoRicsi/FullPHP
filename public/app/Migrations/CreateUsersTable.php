<?php

namespace App\Migrations;
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;


class CreateUsersTable
{
	public function up()
	{
		if (!Manager::schema()->hasTable('users')) {
			Manager::schema()->create('users', function ($table) {
				$table->id();
				$table->string("name", 100);
				$table->string("email", 100);
				$table->enum("gender", ["Fiú/Férfi", "Lány/Nő"]);
				$table->timestamps();
			});
		}
	}

	public function down()
	{
		Manager::schema()->dropIfExists('migrations');
	}
}