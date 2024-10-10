<?php

require __DIR__ . '/../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

$manager = new Manager();

$manager->addConnection([
	'driver'    => 'mysql',
	'host'      => 'localhost',
	'database'  => 'book_reviews',
	'username'  => 'root',
	'password'  => 'root',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
]);

$manager->setAsGlobal();
$manager->bootEloquent();