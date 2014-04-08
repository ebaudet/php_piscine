<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   inscription.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 21:07:12 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 21:10:50 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

	include ("connect.php");
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<?php
		$pseudo = isset($_POST["pseudo"]) ? mysql_real_escape_string(htmlspecialchars($_POST['pseudo'])) : "";
		$email = isset($_POST["email"]) ? mysql_real_escape_string(htmlspecialchars($_POST['email'])) : "";
		$prenom = isset($_POST["prenom"]) ? mysql_real_escape_string(htmlspecialchars($_POST['prenom'])) : "";
		$nom = isset($_POST["nom"]) ? mysql_real_escape_string(htmlspecialchars($_POST['nom'])) : "";
		$sexe = isset($_POST["sexe"]) ? mysql_real_escape_string(htmlspecialchars($_POST['sexe'])) : "";
		
		if (isset($_POST["submit"]) && $_POST["submit"] !== "")
		{
			if (!empty($pseudo) && !empty($email) && !empty($_POST['pass']) && !empty($_POST['pass2']))
			{
				$pass = mysql_real_escape_string(htmlspecialchars($_POST['pass']));
				$pass2 = mysql_real_escape_string(htmlspecialchars($_POST['pass2']));
				if ($pass != $pass2)
					echo "mot de passe differents";
				else
				{
					$password = hash('whirlpool', $pass);
					$droit = 0;
					$query = "INSERT INTO user VALUES('', '$pseudo', '$nom', '$prenom', '$sexe','$email', '$password', '$droit')";
					mysqli_query($con, $query);
					header('Location: index.php');
				}
			}
			else
			{
				echo "champ(s) vide(s)";
			}
		}
	?>
	<div id="wrap">
		<div id="top_info">
			<div id="logo"></div>
			<div id="connect">
				<form action="connexion.php" method="post">
					<input type="text" id="login" name="login" value="" placeholder="login" />
					<input type="password" id="passwd" name="pass" value="" placeholder="mot de passe" />
					<input type="submit" name="submit" value="OK" />
				</form>
				<a href="./inscription.php">Inscription</a>
			</div>
			<div id="panier">
				<span class="panier">Panier</span><br/ >
				<span class="articles">5 articles</span><br />
				<span class="total">15.99€</span>
			</div>
			<br style="clear:both;"/>
		</div>
		<div id="presentation_produit">
			images produits
		</div>
		<form method="post" id="form_inscription" action="inscription.php">
			<label for="email">Pseudo</label><input type="text" id="pseudo" name="pseudo" value="<?=$pseudo?>" /><br/>
			<label for="pass">Mot de passe :</label><input type="password" id="pass" name="pass" /><br/>
			<label for="pass2">Confirmation du mot de passe :</label><input type="password" id="pass2" name="pass2" /><br/>
			<label for="email">Adresse e-mail :</label><input type="text" id="email" name="email"  value="<?=$email?>" /><br/>
			<label for="sexe">Sexe :</label>
			Femme<input type="radio" id="sexe" name="sexe" value="0" />Homme<input type="radio" id="sexe2" name="sexe" value="1" />
			<br/>
			<label for="nom">Nom :</label><input type="text" id="nom" name="nom" value="<?=$nom?>" /><br/>
			<label for="prenom">Prenom :</label><input type="text" id="prenom" name="prenom" value="<?=$prenom?>" /><br/>
			<input type="submit" value="M'inscrire" id="button_submit" name="submit" />
		</form>
		<br style="clear:both;"/>
		<div id="footer">
			&copy Emilien BAUDET - Th&eacute;o QUEMAR - 2014
		</div>
	</div>
</body>
</html>