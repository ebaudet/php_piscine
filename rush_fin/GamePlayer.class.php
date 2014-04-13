<?php 

class GamePlayer extends Player {
	
	protected $_race;
	protected $_pointMax;
	protected $_pointCurrent;
	protected $_nickname;
	protected $_fleet = array();

	public function getRace() { return $this->_race; } 
	public function getPointMax(); { return $this->_pointMax; }
	public function getPointCurrent(); { return $this->_pointCurrent; }
	public function getNickname(); { return $this->_nickname; }
	public function getFleet(); { return $this->_fleet; }
		
	
	public function setRace($v) {
		$this->_race = $v; 
	}
	public function setPointMax($v) {
		$this->_pointMax = $v; 
	}
	public function setPointCurrent($v) {
		$this->_pointCurrent = $v; 
	}
	public function setNickname($v) {
		$this->_nickname = $v; 
	}
	public function setFleet($v) {
		$this->_fleet = $v; 
	}

	public function __construct(Player $player) {
		$this->username = $player->username;
		$this->password = $player->password;
		$this->email    = $player->email;
		$this->games    = $player->games;
		$this->nbwins   = $player->nbwins;
		$this->nbloose  = $player->nbloose;
	}

	public static function doc() {
		echo file_get_contents('GamePlayer.doc.txt');
		return ;
	}

	public __destruct() { return ; }

}

?>