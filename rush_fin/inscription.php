<?php
session_start();
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head charset="utf-8">
	<meta charset="utf-8">
	<title>Inscription</title>
</head>
<body>
<?php 
	$username = isset($_POST["username"]) ? mysql_real_escape_string(htmlspecialchars($_POST['username'])) : "";
	$pass = isset($_POST['pass']) ? mysql_real_escape_string(htmlspecialchars($_POST['pass'])) : "";
	$pass2 = isset($_POST['pass2']) ? mysql_real_escape_string(htmlspecialchars($_POST['pass2'])) : "";
	if (isset($_POST["submit"]) && $_POST["submit"] !== "") {
		if (!empty($username) && !empty($pass) && !empty($pass2))
		{
			if ($pass != $pass2)
			{
				echo "mot de passe différents";
				$pass = "";
				$pass2 = "";
			}
			else
			{
				$query = "SELECT `username` FROM `" . Config::$dbname ."`.`player` WHERE `username` = '" . $username. "';";
				$res = mysqli_query($con, $query);
				$val = mysqli_num_rows($res);
				if (!$val)
				{
					$passwd = hash('whirlpool', $pass);
					$query = "INSERT INTO `" . Config::$dbname . "`.`player` (`username`, password) VALUES ('" . $username. "', '" . $passwd. "');";
					mysqli_query($con, $query);
					$_SESSION["username"] = $username;
					$_SESSION["passwd"] = $passwd;
					$_SESSION["id"] = mysqli_insert_id($con);
					header('Location: index.php');
				}
				else
				{
					echo "username déjà existant";
					$login = "";
				}
			}
		}
	}
 ?>
	<form method="post" id="form_inscription" action="inscription.php">
		<label for="email">username : </label><input type="text" id="username" name="username" value="<?=$username?>" /><br/>
		<label for="pass">Mot de passe :</label><input type="password" id="pass" name="pass" value="<?=$pass?>" /><br/>
		<label for="pass2">Confirmation du mot de passe :</label><input type="password" id="pass2" name="pass2" 
		<?php 
			if ($pass != $pass2)
				echo "class=\"error\"";
			else
				echo "value=\"$pass2\"";
		 ?>
		 /><br/>
		<input type="submit" value="M'inscrire" id="button_submit" name="submit" />
	</form>
	<a href="index.php">retour</a>
</body>
</html>