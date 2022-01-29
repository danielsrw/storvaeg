<?php
	$dbhost = 'remotemysql.com';
	$dbname = 'RfIy7LIkvK';
	$dbuser = 'RfIy7LIkvK';
	$dbpass = 'iwLMR87l0T';

	define("BASE_URL", "https://www.storvaeg.com/");

	// $dbhost = 'localhost';
	// $dbname = 'storvaeg';
	// $dbuser = 'root';
	// $dbpass = '';

	// define("BASE_URL", "http://localhost/projects/projects/st/");

	define("ADMIN_URL", BASE_URL . "admin" . "/");

	try {
		$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch( PDOException $exception ) {
		echo "Connection error :" . $exception->getMessage();
	}