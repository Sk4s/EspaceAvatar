<?php

// PHP 5 and later can work with a MySQL database using:

//    MySQLi extension (the "i" stands for improved)
//    PDO (PHP Data Objects)

//    PDO will work on 12 different database systems, whereas MySQLi will only work with MySQL databases.

//    Both support Prepared Statements. Prepared Statements protect from SQL injection, and are very important for web application security.

define('DBHOST', '127.0.0.1:3306');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', '');

// Création d'un objet de connexion $mysqli
$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Gestion "Erreur de connexion !"
if ($mysqli->connect_errno) {
	echo "<h1>Error: Unable to connect to MySQL.</h1>" . PHP_EOL . "</br>";
 	echo "<h1>Debugging errno: </h1>" . mysqli_connect_errno() . PHP_EOL . "</br>";
 	echo "<h1>Debugging error: </h1>" . mysqli_connect_error() . PHP_EOL . "</br>";
 	die();
 	
 	// printf("Connection failed: %s\n"; $mysqli->connect_error);
} else {
	
}
