<?php
if (isset($_GET["action"]) && isset($_GET["name"]))
{
	switch ($_GET["action"])
	{
		case "set":
			if (isset($_GET["value"]))
				setcookie($_GET["name"], $_GET["value"], time() + (10 * 365 * 24 * 60 * 60));
			break;
		case "get":
			if (isset($_COOKIE[$_GET["name"]]))
				echo $_COOKIE[$_GET["name"]];
			break;
		case "del":
			if (isset($_COOKIE[$_GET["name"]]))
				setcookie($_GET["name"], $_COOKIE[$_GET["name"]], time() - 5000000);
			break;
	}
}
?>