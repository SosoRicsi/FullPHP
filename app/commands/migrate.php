<?php

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../config/db.php';

use Illuminate\Database\Capsule\Manager;

//Import the migrations
$migrations = require __DIR__.'/../../public/app/Migrations/migrations.php';

//Check if the migrations table exists
if (!Manager::schema()->hasTable('migrations')) {

	// If not, create it
	Manager::schema()->create('migrations', function ($table) {
		$table->string('migration')->primary();
		$table->timestamp('created_at')->default(Manager::raw('CURRENT_TIMESTAMP'));
	});
}

foreach ($migrations as $key => $value) {
	$migrationName = (new \ReflectionClass($value))->getShortName();

	if (Manager::table('migrations')->where('migration', $value)->exists()) {
		print "A migráció [{$value}] már végre lett hajtva!\n";
	} else {
		(new $value)->up();
	
		Manager::table('migrations')->insert([
			'migration' => $value,
			'created_at' => date('Y-m-d H:i:s')
		]);
	
		print "Migráció [{$migrationName}] végrehajtva!\n";
	}
}