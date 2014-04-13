<?php

class Game {

	protected $_gameName;
	protected $_gameType;
	protected $_player = array();
	protected $_gameplayer = array();
	protected $_currentPlayer;

	public function getGameName() { return $this->_gameName; } 
	public function getGameType() { return $this->_gameType; }
	public function getPlayer() { return $this->_player; }
	public function getGameplayer() { return $this->_gameplayer; }
	public function getCurrentPlayer() { return $this->_currentPlayer; }
		
	
	public function setGameName($v) {
		$this->_gameName = $v; 
	}
	public function setGameType($v) {
		$this->_gameName = $v; 
	}
	public function setPlayer($v) {
		$this->_player = $v; 
	}
	public function setGameplayer($v) {
		$this->_gameplayer = $v; 
	}
	public function setCurrentplayer($v) {
		$this->_currentPlayer = $v; 
	}

	public function __construct(array $tab) {
		if (array_key_exists('gameName', $tab))
			$this->_gameName = $tab['gameName'];
		if (array_key_exists('gameType', $tab))
			$this->_gameType = $tab['gameType'];
		if (array_key_exists('player', $tab))
			$this->_player = $tab['player'];
		if (array_key_exists('gameplayer', $tab))
			$this->_gameplayer = $tab['gameplayer'];
		if (array_key_exists('currentPlayer', $tab))
			$this->_currentPlayer = $tab['currentPlayer'];
	}		
	
	private function makeArmy () {
			
	}

	public static function doc() {
		echo file_get_contents('Ship.doc.txt');
		return ;
	}

	public function __destruct() { return ; }

	public function __toString() {
		$result = $this->_gameName . ", " . $this->_gameType . ", (";
		foreach ($this->_player as $key => $value) {
			$result .= $value . ",  ";
		}
		$result .= "), (";
		foreach ($this->_gameplayer as $key => $value) {
			$result .= $value . ",  ";
		}
		$result .= "), " . $this->_currentPlayer;
		return $result;
	}

}

?>