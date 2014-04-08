<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   admin_article.php                                  :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 22:09:17 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 22:17:38 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

include ("connect.php");

	if ((!isset($_GET["id"]) || $_GET["id"] === "") && (!isset($_GET["action"]) || $_GET["action"] == ""))
	{
		$query = "SELECT * FROM `article` WHERE 1";
		$result = mysqli_query($con, $query);
		echo "<table>\n";
		echo "<tr><th>Nom</th><th>Prix</th><th>Promotion</th><th>image</th><th>action</th><th>action</th></tr>\n";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>\n";
			echo "<td>" . $row["nom"] . "</td>\n";
			echo "<td>" . $row["prix"] . "€</td>\n";
			if ($row["promotion"] == 1)
				echo "<td>oui</td>\n";
			else
				echo "<td>non</td>\n";
			echo "<td>" . $row["path_img"] . "</td>\n";
			echo "<td><a href=\"admin.php?type=article&id=" . $row["id"] . "&action=set\">modifier</a></td>\n";
			echo "<td><a href=\"admin.php?type=article&id=" . $row["id"] . "&action=del\">supprimer</a></td>\n";
			echo "</tr>\n";
		}
		echo "</table><br />\n";
		echo "<a href=\"admin.php?type=article&action=add\">ajouter un article</a><br />\n";
		echo "<a href=\"admin.php\">retour</a>\n";
	}
	else if (isset($_GET["action"]) && $_GET["action"] == "add")
	{
		if ((!isset($_GET["submit"]) || $_GET["submit"] === ""))
		{
			?>
			<form action="admin.php" method="get">
				<label>nom <input type="text" value="" name="nom" /></label><br />
				<label>prix <input type="text" value="" name="prix" /></label><br />
				<label>emplacement de l'image <input type="text" value="" name="path_img" /></label><br />
				<label>en promotion <input type="checkbox" name="promotion" value="1" /></label><br />
				<input type="submit" name="submit" value="OK" />
				<input name="type" value="article" style="display:none;" />
				<input name="action" value="add" style="display:none;" />
			</form>
			<a href="admin.php?type=article">Annuler</a>
			<?php
		}
		else if ($_GET["submit"] === "OK")
		{
			$query = "INSERT INTO `$dbname`.`article` (`id`, `nom`, `prix`, `promotion`, `path_img`) VALUES (NULL, '" . $_GET["nom"] . "', '" . $_GET["prix"] . "', '" . $_GET["promotion"] . "', '" . $_GET["path_img"] . "');";
			mysqli_query($con, $query);
			header('Location: admin.php?type=article');
		}
		else
			header('Location: admin.php?type=article');
	}
	else if (isset($_GET["action"]) && $_GET["action"] === "set")
	{
		if ((!isset($_GET["id"]) || $_GET["id"] === ""))
			header('Location: admin.php?type=article');
		if ((!isset($_GET["submit"]) || $_GET["submit"] === ""))
		{
			$query = "SELECT * FROM `article` WHERE `id` = " . $_GET["id"];
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			?>
			<form action="admin.php" method="get">
				<label>nom <input type="text" value="<?=$row["nom"]?>" name="nom" /></label><br />
				<label>prix <input type="text" value="<?=$row["prix"]?>" name="prix" /></label><br />
				<label>emplacement de l'image <input type="text" value="<?=$row["path_img"]?>" name="path_img" /></label><br />
				<label>en promotion <input type="checkbox" name="promotion" value="1" <?php if ($row["promotion"] == 1){echo "checked";}?> /></label>
				<label>cat&eacute;gories assioci&eacute;es :</label>
				<select name="categories[]" multiple size=8>
				<?php
					$query = "SELECT * FROM `categorie`";
					$result = mysqli_query($con, $query);
					while ($cat_sql = mysqli_fetch_array($result))
					{
						$query = "SELECT * FROM `categorie_article` WHERE `id_article` = " . $_GET["id"] . " AND `id_categorie` = ". $cat_sql["id"] . ";";
						$result2 = mysqli_query($con, $query);
						$selected = mysqli_num_rows($result2);
						echo "<option value=\"".$cat_sql["id"]."\" ";
						if ($selected)
							echo "selected";
						echo ">" . $cat_sql["nom"]."</option>\n";
					}
					?>
				</select>
				<input type="submit" name="submit" value="OK" />
				<input name="type" value="article" style="display:none;" />
				<input name="id" value="<?=$row["id"]?>" style="display:none;" />
				<input name="action" value="set" style="display:none;" />
			</form>
			<a href="admin.php?type=article">Annuler</a>
			<?php
		}
		else if ($_GET["submit"] === "OK")
		{
			$query = "UPDATE `$dbname`.`article` SET `nom` = '" . $_GET["nom"] . "', `prix` = '" . $_GET["prix"] . "', `promotion` = '" . $_GET["promotion"] . "', `path_img` = '" . $_GET["path_img"] . "' WHERE `article`.`id` = " . $_GET["id"] . ";";
			mysqli_query($con, $query);
			$query = "DELETE FROM `$dbname`.`categorie_article` WHERE `categorie_article`.`id_article` = " . $_GET["id"] .";";
			mysqli_query($con, $query);
			foreach ($_GET["categories"] as $key => $value) {
				$query = "INSERT INTO `$dbname`.`categorie_article`(`id`, `id_article`, `id_categorie`) VALUES (NULL, '" . $_GET["id"] . "', '". $value ."');";
				mysqli_query($con, $query);
			}
			header('Location: admin.php?type=article');
		}
		else
			header('Location: admin.php?type=article');
	}
	else if (isset($_GET["action"]) && $_GET["action"] === "del" && isset($_GET["id"]) && $_GET["id"] !== "")
	{
		$query = "DELETE FROM `$dbname`.`article` WHERE `article`.`id` = " . $_GET["id"] .";";
		mysqli_query($con, $query);
		$query = "DELETE FROM `$dbname`.`categorie_article` WHERE `categorie_article`.`id_article` = " . $_GET["id"] .";";
		mysqli_query($con, $query);
		header('Location: admin.php?type=article');
	}

?>