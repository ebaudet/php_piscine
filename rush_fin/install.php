<?php

// inclusion des variables de connexion
require_once("Config.class.php");


// Création de la base de données
$con = mysqli_connect(Config::$host, Config::$user, Config::$password);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br />\n";
$sql = "CREATE DATABASE " . Config::$dbname. ";";
if (mysqli_query($con, $sql))
	echo "Database " . Config::$dbname. " created successfully<br />\n";
else
	echo "Error creating database: " . mysqli_error($con)."<br />\n";


// Lecture du fichier .sql dans la variable $sql
$fp = fopen(Config::$file_sql, "r");
$sql2 = "";
while (!feof($fp)) {
	$sql2 .= fgets($fp, 4096);
}
fclose($fp);


// Connexion au serveur
$con = mysqli_connect(Config::$host, Config::$user, Config::$password, Config::$dbname);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br />\n";


// Ajout des tables et du contenu ligne par linge
$tab = explode(';', $sql2);
$c = count($tab);
foreach ($tab as $key => $value) {
	if ($key != $c - 1)
	{
		if (mysqli_query($con, $value." ;"))
			echo "cr&eacute;ation des table et contenus OK<br />\n";
		else
			echo "Error creating table: " . mysqli_error($con) . "<br />\n";
	}
}

?>