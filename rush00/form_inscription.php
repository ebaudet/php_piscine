<?php
	include ("connect.php");
	if (!empty($_POST['pseudo']))
	{
		$pass = mysql_real_escape_string(htmlspecialchars($_POST['pass']));
		$pass2 = mysql_real_escape_string(htmlspecialchars($_POST['pass2']));
		if ($pass != $pass2)
			echo "mot de passe differents";
		else
		{
			$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
			$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
			$prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
			$nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
			$sexe = mysql_real_escape_string(htmlspecialchars($_POST['sexe']));
			$password = sha1($pass);
			$droit = 0;
			$query = "INSERT INTO user VALUES('', '$pseudo', '$nom', '$prenom', '$sexe','$email', '$password', '$droit')";
			mysqli_query($con, $query);
		}
	}
	else
	{
		echo "champ(s) vide(s)";
	}
?>
