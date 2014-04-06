<?php

if (isset($_POST["submit"]) && isset($_POST["login"]) && isset($_POST["passwd"])
	&& $_POST["submit"] === "OK" && $_POST["submit"] !== "" && $_POST["submit"] !== "")
{
	if (!file_exists("../private"))
		mkdir("../private");
	if (file_put_contents("../private/passwd", "", FILE_USE_INCLUDE_PATH | FILE_APPEND) !== FALSE)
	{
		if (($file = file_get_contents("../private/passwd")) !== FALSE)
		{
			$tab = unserialize($file);
			echo "<pre>";
			print_r($tab);
			echo "</pre>";
		}
		else
		{
			echo "ERROR\n";
			exit ;
		}
	}
	else
	{
		echo "ERROR\n";
		exit ;
	}
	if (file_put_contents("../private/passwd", serialize($_POST), FILE_USE_INCLUDE_PATH | FILE_APPEND) !== FALSE)
	{
		echo "ok cool";
	}
}
else
	echo "ERROR\n";


?>