<?php	

	$hostname = "localhost";	//ou localhost
	$base= "econtact";
	$loginBD= "root";	//ou "root"
	$passBD="root";
	$pdo = null;

try {
	$pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
	//die('OK connexion');
}

catch (PDOException $e) {
	die  ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
}

?>