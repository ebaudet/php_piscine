<?php
require_once("Config.class.php");
$con = mysqli_connect(Config::$host, Config::$user, Config::$password, Config::$dbname) or die("ERROR" . mysmysqli_error($con));
?>