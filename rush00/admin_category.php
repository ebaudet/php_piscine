<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   admin_category.php                                 :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: ebaudet <ebaudet@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2014/04/06 21:40:19 by ebaudet           #+#    #+#             */
/*   Updated: 2014/04/06 22:08:05 by ebaudet          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

include ("connect.php");

	if ((!isset($_GET["id"]) || $_GET["id"] === "") && (!isset($_GET["action"]) || $_GET["action"] == ""))
	{
		$query = "SELECT * FROM `categorie` WHERE 1";
		$result = mysqli_query($con, $query);
		echo "<table>\n";
		echo "<tr><th>Nom</th><th>action</th><th>action</th></tr>\n";
		while ($row = mysqli_fetch_array($result)) {
			echo "<tr>\n";
			echo "<td>" . $row["nom"] . "</td>\n";
			echo "<td><a href=\"admin.php?type=category&id=" . $row["id"] . "&action=set\">modifier</a></td>\n";
			echo "<td><a href=\"admin.php?type=category&id=" . $row["id"] . "&action=del\">supprimer</a></td>\n";
			echo "</tr>\n";
		}
		echo "</table><br />\n";
		echo "<a href=\"admin.php?type=category&action=add\">ajouter une categorie</a><br />\n";
		echo "<a href=\"admin.php\">retour</a>\n";
	}
	else if (isset($_GET["action"]) && $_GET["action"] == "add")
	{
		if ((!isset($_GET["submit"]) || $_GET["submit"] === ""))
		{
			?>
			<form action="admin.php" method="get">
				<label>nom <input type="text" value="" name="nom" /></label><br />
				<input type="submit" name="submit" value="OK" />
				<input name="type" value="category" style="display:none;" />
				<input name="action" value="add" style="display:none;" />
			</form>
			<a href="admin.php?type=category">Annuler</a>
			<?php
		}
		else if ($_GET["submit"] === "OK")
		{
			$query = "INSERT INTO `$dbname`.`categorie` (`id`, `nom`) VALUES (NULL, '" . $_GET["nom"] . "');";
			mysqli_query($con, $query);
			header('Location: admin.php?type=category');
		}
		else
			header('Location: admin.php?type=category');
	}
	else if (isset($_GET["action"]) && $_GET["action"] === "set")
	{
		if ((!isset($_GET["id"]) || $_GET["id"] === ""))
			header('Location: admin.php?type=category');
		if ((!isset($_GET["submit"]) || $_GET["submit"] === ""))
		{
			$query = "SELECT * FROM `categorie` WHERE `id` = " . $_GET["id"];
			$result = mysqli_query($con, $query);
			$row = mysqli_fetch_array($result);
			?>
			<form action="admin.php" method="get">
				<label>nom <input type="text" value="<?=$row["nom"]?>" name="nom" /></label><br />
				<input type="submit" name="submit" value="OK" />
				<input name="type" value="category" style="display:none;" />
				<input name="id" value="<?=$row["id"]?>" style="display:none;" />
				<input name="action" value="set" style="display:none;" />
			</form>
			<a href="admin.php?type=category">Annuler</a>
			<?php
		}
		else if ($_GET["submit"] === "OK")
		{
			$query = "UPDATE `$dbname`.`categorie` SET `nom` = '" . $_GET["nom"] . "' WHERE `categorie`.`id` = " . $_GET["id"] . ";";
			mysqli_query($con, $query);
			header('Location: admin.php?type=category');
		}
		else
			header('Location: admin.php?type=category');
	}
	else if (isset($_GET["action"]) && $_GET["action"] === "del" && isset($_GET["id"]) && $_GET["id"] !== "")
	{
		$query = "DELETE FROM `$dbname`.`categorie` WHERE `categorie`.`id` = " . $_GET["id"] .";";
		mysqli_query($con, $query);
		$query = "DELETE FROM `$dbname`.`categorie_article` WHERE `categorie_article`.`id_categorie` = " . $_GET["id"] .";";
		mysqli_query($con, $query);
		header('Location: admin.php?type=category');
	}

?>