<?php
	session_start();

	include ("connect.php");
	if (!isset($_GET["id"]) || $_GET["id"] === "")
		header('Location: index.php');
	$query = "SELECT * FROM `article` WHERE `id` = " . mysql_real_escape_string(htmlspecialchars($_GET["id"])) . ";";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_array($result);
		echo $row["prix"];
		$_SESSION["basket"]["total"] += $row["prix"];
		array_push($_SESSION["basket"], $row);
		header('Location: index.php');
	}
	else
		header('Location: index.php');
	
?>