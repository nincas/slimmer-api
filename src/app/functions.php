<?php

/**
* @global All global functions here
*/
use Psr\Http\Message\ResponseInterface as Response;

function loadEnv() {
	$env = '../.env';
	if (file_exists($env)) (new Symfony\Component\Dotenv\Dotenv)->load($env);
}

function loadDb() {
	$config = [
		'driver'    => getenv("DB_DRIVER"),
		'host'      => getenv("DB_HOST"),
		'database'  => getenv("DB_NAME"),
		'username'  => getenv("DB_USER"),
		'password'  => getenv("DB_PASS"),
		'charset'   => getenv("DB_CHARSET"),
		'collation' => getenv("DB_COLLATION"),
		'prefix'    => getenv("DB_PREFIX")
	];

	(new \App\Database($config));
}


function errorMessages($code) {
	$errors = [
		01 => 'Token expired.',
		02 => 'Invalid token.',
		03 => 'Authentication failed.',
		5 => 'Too few arguments.'
	];

	if ($errors[$code]) {
		return ['error' => [$code => $errors[$code]]];
	}
}