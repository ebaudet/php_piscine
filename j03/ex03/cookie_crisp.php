<?php
switch ($_GET["action"])
{
	case "set":
		setcookie($_GET["name"], $_GET["value"], time() + (10 * 365 * 24 * 60 * 60));
		break;
	case "get":
		echo $_COOKIE[$_GET["name"]];
		break;
	case "del":
		setcookie($_GET["name"], $_COOKIE[$_GET["name"]], time() - 5000000);
		break;
}
?>