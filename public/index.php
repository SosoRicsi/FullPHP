<?php

require __DIR__.'/../vendor/autoload.php';

use SosoRicsi\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

JWT::setKey(env('SECRET_KEY'));

$payload = [
	'username' => "SosoRicsi"
];

print $token = JWT::encode($payload);

print "\n";

print "<pre>";
print_r(JWT::decode($token));

JWT::reset();