<?php
	session_start();
	require_once("connect.php");
	$username = isset($_POST["username"]) ? mysql_real_escape_string(htmlspecialchars($_POST['username'])) : "";
	$pass = isset($_POST["passwd"]) ? mysql_real_escape_string(htmlspecialchars($_POST['passwd'])) : "";
	$passwd = hash('whirlpool', $pass);
	$query = "SELECT * FROM `player` WHERE `username` = '" . $username . "' AND `password` = '" . $passwd . "';";
	$res = mysqli_query($con, $query);
	$row = mysqli_fetch_array($res);
	$val = mysqli_num_rows($res);
	if ($val)
	{
		$_SESSION["username"] = $username;
		$_SESSION["passwd"] = $passwd;
		$_SESSION["id"] = $row["id"];
		header("Location: index.php");
	}
?>

<form action="connexion.php" method="post">
	<input type="text" id="username" name="username" value="" placeholder="username" />
	<input type="password" id="passwd" name="passwd" value="" placeholder="mot de passe" />
	<input type="submit" name="submit" value="OK" />
</form>
<a href="inscription.php">Inscription</a>
