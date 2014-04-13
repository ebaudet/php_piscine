<?php 

$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$passwd = isset($_SESSION['passwd']) ? $_SESSION['passwd'] : "";
if (empty($username) || empty($passwd))
{
	$_SESSION['username'] = "";
	$_SESSION['passwd'] = "";
}
else
{
	include ("connect.php");
	$query = "SELECT `username`, `password` FROM `". Config::$dbname . "`.`player` WHERE `username` = '" . $username. "' AND `password` = '" . $passwd . "';";
	$res = mysqli_query($con, $query);
	$val = mysqli_num_rows($res);
	if (!$val)
	{
		$_SESSION['username'] = "";
		$_SESSION['passwd'] = "";
	}
}

?>