<?php

require_once("Config.class.php");

class Player {
	protected $_username;
	protected $_password;
	protected $_email;
	protected $_game = array();
	protected $_nbWins;
	protected $_nbLoose;
	protected $_id;

	public function getUsername() { return $this->_username; } 
	public function getPassword() { return $this->_password; }
	public function getEmail() { return $this->_email; }
	public function getGame() { return $this->_game; }
	public function getNbwins() { return $this->_nbwin; }
	public function getNbloose() { return $this->_nbloose; }
	public function getId() { return $this->_id; }
	
	public function setUsename($v) {
		$this->_username = $v; 
	}
	public function setPassword($v) {
		$this->_password = $v; 
	}
	public function setEmail($v) {
		$this->_email = $v; 
	}
	public function setGame($v) {
		$this->_game = $v; 
	}
	public function setNbwins($v) {
		$this->_nbwins = $v; 
	}
	public function setNbloose($v) {
		$this->_nbloose = $v; 
	}
	public function setId($v) {
		$this->_id = $v; 
	}

	public static function doc() {
		echo file_get_contents('Player.doc.txt');
		return ;
	}
	
	public function __construct($tab) {
		if (array_key_exists('username', $tab))
			$this->_username = $tab['username'];
		if (array_key_exists('password', $tab))
			$this->_password = $tab['password'];
		if (array_key_exists('email', $tab))
			$this->_email = $tab['email'];
		if (array_key_exists('game', $tab))
			$this->_game = $tab['game'];
		if (array_key_exists('nbwins', $tab))
			$this->_nbwins = $tab['nbwins'];
		if (array_key_exists('nbloose', $tab))
			$this->_nbloose = $tab['nbloose'];
		if (array_key_exists('id', $tab))
			$this->_id = $tab['id'];
	}		

	public function getBdd($id) {

		$query = "SELECT * FROM `" . Config::$dbname . "`.`player` WHERE `id` = " . $id. ";";
		$con = mysqli_connect(Config::$host, Config::$user, Config::$password, Config::$dbname) or die("ERROR" . mysmysqli_error($con));
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$this->_username = $row["username"];
		$this->_password = $row["password"];
		$this->_nbWins = $row["nbWin"];
		$this->_nbLoose = $row["nbLoose"];
		$this->_id = $row["id"];
	}

	public function setBdd() {
		$con = mysqli_connect(Config::$host, Config::$user, Config::$password, Config::$dbname) or die("ERROR" . mysmysqli_error($con));

		$query = "UPDATE `starship`.`player` SET `username` = \'". $this->_username . "\', `password` = \'" .  $this->_password . "\', `nbWin` = \'". $this->_nbWins . "\', `nbLoose` = \'". $this->_nbLoose . "\' WHERE `player`.`id` = " . $this->_id . ";";
		$result = mysqli_query($con, $query);
	}

	public function __destruct() { return ; }

	public function __toString() {
		return $this->_username .", " . $this->_password .", " . $this->_email .", " . $this->_nbWins .", " . $this->_nbLoose .", " . $this->_id;

	}
}


?>