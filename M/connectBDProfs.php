<?php
	$hostname = "localhost";	
	$base= "pweb18_nguyen";
	$loginBD= "pweb18_nguyen";	
	$passBD="31051999";
	try {
		$dsn = "mysql:server=$hostname ; dbname=$base";
		$pdo = new PDO ($dsn, $loginBD, $passBD,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connexion au DSN: ".$dsn." OK! </br>";
	}
	catch (PDOException $e) {
		// affiche le message d'erreur associé à l'exception
		echo utf8_encode("Echec de connexion : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	
?>	