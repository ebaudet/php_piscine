<?php
if ((isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] !== "") && (isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_PW'] !== ""))
{
	$PHP_AUTH_USER = $_SERVER['PHP_AUTH_USER'];
	$PHP_AUTH_PW = $_SERVER['PHP_AUTH_PW'];
}
else
{
	header('WWW-Authenticate: Basic realm=""');
	header('HTTP/1.0 401 Unauthorized');
	exit;
}
if ($PHP_AUTH_USER === "zaz" && $PHP_AUTH_PW === "jaimelespetitsponeys")
{
	$file = base64_encode(file_get_contents("../img/42.png"));
	echo "<html><body>Bonjour Zaz<br />\n<img src='data:image/png;base64,$file>\n</body></html>\n";
}
else
{
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	header("Connection: close", true);
}
?>