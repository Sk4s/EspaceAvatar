<?php



// Script php de création de la base de données accounts et de la table users



//Connection variables



$host = '127.0.0.1:3306';  //127.0.0.1:3306 pour Linux

$user = 'root';

$password = '';



//Create mysql connection

$mysqli = new mysqli($host,$user,$password);



if ($mysqli->connect_errno) {

    

    //echo "Erreur de connexion !!!!";



    echo "<h1>Error: Unable to connect to MySQL.</h1>" . PHP_EOL . "<br />";

    echo "<h1>Debugging errno: </h1>" . mysqli_connect_errno() . PHP_EOL . "<br />";

    echo "<h1>Debugging error: </h1>" . mysqli_connect_error() . PHP_EOL . "<br />";

    die();



    //printf("Connection failed: %s\n", $mysqli->connect_error);

    die();

}



//Create the database

if ( !$mysqli->query('CREATE DATABASE accounts_bis') ) {

    printf("Errormessage: %s\n", $mysqli->error);

}



//Create users table with all the fields

//On va créer une nouvelle table admin dans la base espav

$mysqli->query('

CREATE TABLE `accounts_bis`.`users` 

(

    `id` INT NOT NULL AUTO_INCREMENT,

    `username` VARCHAR(100) NOT NULL,

    `email` VARCHAR(100) NOT NULL,

    `password` VARCHAR(100) NOT NULL,

    `avatar` VARCHAR(100) NOT NULL,

PRIMARY KEY (`id`) 

);') or die($mysqli->error);



?>