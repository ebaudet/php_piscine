<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   index.php                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 21:09:34 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 23:19:05 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

session_start();
if (!isset($_SESSION["basket"]))
{
	$_SESSION["basket"] = array("total" => 0);
}
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>e-shop - HOME</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<div id="wrap">
		<?php if (isset($_GET["error"]) && $_GET["error"] === "login") { ?>
		<div id="error">
			ERROR CONNEXION...
		</div>
		<?php } ?>
		<div id="top_info">
			<div id="logo"></div>
			<div id="connect">
			<?php
				if ((!isset($_SESSION['login']) || $_SESSION['login'] === "") && (!isset($_SESSION['password']) || $_SESSION['password'] === ""))
				{
			?>

				<form action="connexion.php" method="post">
					<input type="text" id="login" name="login" value="" placeholder="login" />
					<input type="password" id="pass" name="pass" value="" placeholder="mot de passe" />
					<input type="submit" name="submit" value="OK" />
				</form>
				<a href="./inscription.php">Inscription</a>

			<?php
				}
				else
					echo "Bienvenu " . $_SESSION['login'] . " [<a href=\"logout.php\">x</a>]";
			?>
			</div>
			<div id="panier">
				<span class="panier">Panier</span><br/ >
				<span class="articles"><?php 
					echo count($_SESSION["basket"]) - 1;
				?> articles</span><br />
				<span class="total"><?=$_SESSION["basket"]["total"]?>€</span>
			</div>
			<br style="clear:both;"/>
		</div>
		<div id="presentation_produit">
			images produits
		</div>
		<div id="content">
			<?php
				include ("connect.php");
				$query = "SELECT * FROM `categorie` WHERE 1";
				$result = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($result)) {
					$query2 = "SELECT * FROM `categorie_article` WHERE `id_categorie` = ". $row["id"] . ";";
					$result2 = mysqli_query($con, $query2);
					if (mysqli_num_rows($result2) > 0)
					{
						?>
			<div class="category">
				<h2><?=$row["nom"]?></h2>
				<?php
					$result3 = mysqli_query($con, $query2);
					while ($row3 = mysqli_fetch_array($result3)) {
						$query4 = "SELECT * FROM `article` WHERE `id` = " . $row3["id_article"] .";"; 
						$result4 = mysqli_query($con, $query4);
						$row4 = mysqli_fetch_array($result4);
						?>
				<div class="article">
					<div class="image">
						<a href="ajout_panier.php?id=<?=$row4["id"]?>">
						<img src="<?=$row4["path_img"]?>" alt="<?=$row4["nom"]?>" title="<?=$row4["nom"]?>" />
						</a>
					</div>
					<div class="desc">
						<a href="ajout_panier.php?id=<?=$row4["id"]?>">
							<h4><?=$row4["nom"]?></h4>
						</a>
						<span class="prix"><?=$row4["prix"]?> €</span>
					</div>
					<br style="clear:both;"/>
				</div>
						<?php
					}
				?>
				<br style="clear:both;"/>
			</div>
						<?php
					}
				}
			?>			
		</div>
		<br style="clear:both;"/>
		<div id="footer"><br style="clear:both;"/>
			&copy Emilien BAUDET - Th&eacute;o QUEMAR - 2014
		</div>
	</div>
</body>
</html>
