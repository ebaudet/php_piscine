<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   create.php                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 21:12:54 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 21:13:37 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

// inclusion des variables de connexion
include ("configuration.php");


// Création de la base de données
$con = mysqli_connect($host, $user, $password);
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error() . "<br />\n";
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($con, $sql))
	echo "Database $dbname created successfully<br />\n";
else
	echo "Error creating database: " . mysqli_error($con)."<br />\n";


// Lecture du fichier .sql dans la variable $sql
$fp = fopen("$file_sql", "r");
$sql2 = "";
while (!feof($fp)) {
	$sql2 .= fgets($fp, 4096);
}
fclose($fp);


// Connexion au serveur
$con = mysqli_connect($host, $user, $password, $dbname);
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
