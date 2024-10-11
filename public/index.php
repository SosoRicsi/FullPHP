<?php

require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$jwt = new SosoRicsi\JWT\JWT(env('SECRET_KEY'));

$payload = [
	'username' => "SosoRicsi"
];

$token = $jwt->encode($payload);

print $token;

$decoded = $jwt->decode($token);

print "\n";

print "<pre>";
print_r($decoded);

$jwt->reset();