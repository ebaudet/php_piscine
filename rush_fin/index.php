<?php
session_start();
include ("test_connexion.php");
if ((!isset($_SESSION['username']) || $_SESSION['username'] === "") && (!isset($_SESSION['passwd']) || $_SESSION['passwd'] === ""))
{
	header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head charset="utf-8">
	<meta charset="utf-8">
	<title>starship</title>
	<link rel="stylesheet" href="template_game.css">
</head>
<body>
	<a href="logout.php">déconnexion</a>
	<?php 
		require_once("Player.class.php");
		$me = new Player(array());
		echo $_SESSION["id"];
		$me->getBdd($_SESSION["id"]);
		echo $me;
		echo "<br/>";
		require_once("Game.class.php");
		$game = new Game(array(
			"gameName" => "zbra",
			"gameType" => "1",
			"player" => array($me)
		));
		echo $game;
		echo "<br/>";
		require_once("Ship.class.php");
		require_once("weapons/Lance.class.php");
		$ship = new Ship(array(
			"owner" => $me,
			"weapons" => new Lance(array())
		));
		echo $ship;
		?>
		<br/><h4>lance :</h4>
		<?php
		$lance = new Lance(array());
		echo $lance;
		include ("template_game.php");
	 ?>
<footer>&copy ebaudet - thunebl - vdiridol - 2014</footer>
</body>
</html>