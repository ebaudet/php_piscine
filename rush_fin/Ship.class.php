<?php

class Ship {

	private $_owner;
	private $_weapons = array();
	private $_shieldbase;
	private $_shieldcurrent;
	private $_PPcapacity;
	private $_PPcurent;
	private $_speed;
	private $_manvr;
	private $_moveLastTurn;
	private $_notes;

	public function getOwner() { return $this->_owner; } 
	public function getWeapons() { return $this->_weapons; }
	public function getShieldbase() { return $this->_shieldbase; }
	public function getShieldcurent() { return $this->_shieldcurent; }
	public function getPPcapacity() { return $this->_PPcapacity; }
	public function getPPcurrent() { return $this->_PPcurrent; }
	public function getSpeed() { return $this->_speed; }
	public function getManvr() { return $this->_manvr; }
	public function getMoveLastTurn() { return $this->_moveLastTurn; }
	public function getNotes() { return $this->_notes; }
		
	
	public function setOwner($v) {
		$this->_owner = $v; 
	}
	public function setWeapons($v) {
		$this->_weapons = $v; 
	}

	public function setShieldbase($v) {
		$this->_shieldbase = $v; 
	}
	public function setShieldcurent($v) {
		$this->_shieldcurent = $v; 
	}
	public function setPPcapacity($v) {
		$this->_PPcapacity = $v; 
	}
	
	public function setPPcurrent($v) {
		$this->_PPcurrent = $v;
	}
	public function setSpeed($v) {
		$this->_speed = $v; 
	}
	public function setManvr($v) {
		$this->_manvr = $v; 
	}
	public function setMoveLastTurn($v) {
		$this->_moveLastTurn = $v; 
	}
	public function setNotes($v) {
		$this->_notes = $v; 
	}
	
	public function __construct(array $tab) {
		if (array_key_exists('owner', $tab))
			$this->_owner = $tab['owner'];
		if (array_key_exists('weapons', $tab))
			$this->_weapons = $tab['weapons'];
		if (array_key_exists('shieldbase', $tab))
			$this->_shieldbase = $tab['shieldbase'];
		if (array_key_exists('shieldcurrent', $tab))
			$this->_shieldcurrent = $tab['shieldcurrent'];
		if (array_key_exists('PPcapacity', $tab))
			$this->_PPcapacity = $tab['PPcapacity'];
		if (array_key_exists('PPcurent', $tab))
			$this->_PPcurent = $tab['PPcurent'];
		if (array_key_exists('speed', $tab))
			$this->_speed = $tab['speed'];
		if (array_key_exists('manvr', $tab))
			$this->_manvr = $tab['manvr'];
		if (array_key_exists('moveLastTurn', $tab))
			$this->_moveLastTurn = $tab['moveLastTurn'];
		if (array_key_exists('notes', $tab))
			$this->_notes = $tab['notes'];
	}

	public static function doc() {
		echo file_get_contents('Ship.doc.txt');
		return ;
	}

	public function __destruct() { return ; }

	public function __toString() {
		$result = "(" . $this->_owner . "), (";
		foreach ($this->_weapons as $key => $value) {
			$result .= $value . ", ";
		}
		$result .= "), " . $this->_shieldbase . ", " . $this->_shieldcurrent . ", " . $this->_PPcapacity . ", " . $this->_PPcurent . ", " . $this->_speed . ", " . $this->_manvr . ", " . $this->_moveLastTurn . ", " . $this->_notes;
		return $result;
	}
}

?>