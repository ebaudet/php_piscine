<?php

require_once 'Color.class.php';

Class Vertex {

	private $_x     = 0.0;
	private $_y     = 0.0;
	private $_z     = 0.0;
	private $_w     = 1.0;
	private $_color;
	static $verbose = False;

	function __construct(array $kwargs) {
		if (array_key_exists('x', $kwargs))
			$this->_x = $kwargs['x'];
		if (array_key_exists('y', $kwargs))
			$this->_y = $kwargs['y'];
		if (array_key_exists('z', $kwargs))
			$this->_z = $kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = $kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_color = clone $kwargs['color'];
		else
			$this->_color = new Color(array('rgb' => 0xFFFFFF));
		if (self::$verbose)
			print( $this . " constructed" . PHP_EOL );
	}

	function __destruct() {
		if (self::$verbose)
			print( $this . " destructed" . PHP_EOL );
		return ;
	}

	static function doc() {
		return (file_get_contents("./Vertex.doc.txt"));
	}

	function __toString() {
		$toPrint = "Vertex( x: " . sprintf("%.2f", $this->_x) . ", y: " . sprintf("%.2f", $this->_y) . ", z:" . sprintf("%.2f", $this->_z) . ", w:" . sprintf("%.2f", $this->_w);
		if (self::$verbose)
			$toPrint .= ", " . $this->_color;
		$toPrint .= " )";
		return $toPrint;
	}

	/* Getters */
	function getX() {
		return $this->$_x;
	}

	function getY() {
		return $this->$_y;
	}

	function getZ() {
		return $this->$_z;
	}

	function getW() {
		return $this->$_w;
	}

	function getColor() {
		return $this->$_color;
	}

	/* Setters */
	function setX($v) {
		$this->$_x = $v;
	}

	function setY($v) {
		$this->$_y = $v;
	}

	function setZ($v) {
		$this->$_z = $v;
	}

	function setW($v) {
		$this->$_w = $v;
	}

	function setColor($v) {
		$this->$_color = $v;
	}

}

?>