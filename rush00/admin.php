<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Titre de la page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="administration">
		<?php
			if (!isset($_GET["type"]) || $_GET["type"] === "")
			{
		?>
				<a href="admin.php?type=article">Gestion des articles</a><br />
				<a href="admin.php?type=category">Gestion des cat&eacute;gories</a><br />
				<a href="admin.php?type=user">Gestion des utilisateurs</a>
		<?php
			}
			if (isset($_GET["type"]) && $_GET["type"] === "article")
			{
				include ("admin_article.php");
			}
			else if (isset($_GET["type"]) && $_GET["type"] === "category")
			{
				include ("admin_category.php");
			}
			else if (isset($_GET["type"]) && $_GET["type"] === "user")
			{
				include ("admin_user.php");
			}

		?>		
	</div>
</body>
</html>