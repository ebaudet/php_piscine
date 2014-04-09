<?php

require_once 'Vertex.class.php';

Class Vector {
	private $_x      = 0.0;
	private $_y      = 0.0;
	private $_z      = 0.0;
	private $_w      = 0.0;
	static 	$verbose = False;

	function __construct(array $kwargs) {
		if (array_key_exists('dest', $kwargs))
		{

		}
		else
		{
			echo "a pas de dest" . PHP_EOL;
			exit ;
		}
		if (array_key_exists('orig', $kwargs))
		{

		}
		else
		{
			
		}
		if (self::$verbose)
			print( $this . " constructed" . PHP_EOL );
	}

	
	function __destruct() {
		if (self::$verbose)
			print( $this . " destructed" . PHP_EOL );
		return ;
	}

	function __toString() {

	}


	function magnitude() {
		return sqrt(pow($this->_x, 2), pow($this->_y, 2), pow($this->_z, 2)); 
	}

	function normalize() {
		$id = 1 / magnitude();

		return new Vector(array('dest' => new Vertex(array('x'=> $this->_x * $id, 'y'=> $this->_y * $id, 'z'=> $this->_z * $id))));
	}

	function add(Vector $rhs) {
		
	}



	function __clone() {}

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
	function __get() {
		return 'arrrrg';
	}

	/* Setters */
	function __set() {
		return ;
	}

	static function doc() {
		return (file_get_contents("./Vector.doc.txt"));
	}
}


?>