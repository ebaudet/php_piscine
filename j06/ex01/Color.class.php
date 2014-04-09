<?php

Class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	static $verbose = False;

	function __construct(array $kwargs) {
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = ($kwargs['rgb'] >> 16) % 256;
			$this->green = ($kwargs['rgb'] >> 8) % 256;
			$this->blue = $kwargs['rgb'] % 256;
		}
		if (array_key_exists('red', $kwargs))
			$this->red = $kwargs['red'];
		if (array_key_exists('green', $kwargs))
			$this->green = $kwargs['green'];
		if (array_key_exists('blue', $kwargs))
			$this->blue = $kwargs['blue'];
		if (self::$verbose)
			print( $this . " constructed." . PHP_EOL );
	}

	function __destruct() {
		if (self::$verbose)
			print( $this . " destructed." . PHP_EOL );
	}


	static function doc() {
		return (file_get_contents("./Color.doc.txt"));
	}

	function __toString() {
		return "Color( red:".sprintf("%4d", $this->red).", green:".sprintf("%4d", $this->green).", blue:".sprintf("%4d", $this->blue)." )";
	}

	function add($color) {
		$red = $this->red + $color->red;
		$red = ($red > 255) ? 255 : $red;
		$red = ($red < 0) ? 0 : $red;

		$green = $this->green + $color->green;
		$green = ($green > 255) ? 255 : $green;
		$green = ($green < 0) ? 0 : $green;

		$blue = $this->blue + $color->blue;
		$blue = ($blue > 255) ? 255 : $blue;
		$blue = ($blue < 0) ? 0 : $blue;

		$out = New Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
		return ($out);
	}

	function sub($color) {
		$red = $this->red - $color->red;
		$red = ($red > 255) ? 255 : $red;
		$red = ($red < 0) ? 0 : $red;

		$green = $this->green - $color->green;
		$green = ($green > 255) ? 255 : $green;
		$green = ($green < 0) ? 0 : $green;

		$blue = $this->blue - $color->blue;
		$blue = ($blue > 255) ? 255 : $blue;
		$blue = ($blue < 0) ? 0 : $blue;

		$out = New Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
		return ($out);
	}

	function mult($facteur) {
		$red = $this->red * $facteur;
		$red = ($red > 255) ? 255 : $red;
		$red = ($red < 0) ? 0 : $red;

		$green = $this->green * $facteur;
		$green = ($green > 255) ? 255 : $green;
		$green = ($green < 0) ? 0 : $green;

		$blue = $this->blue * $facteur;
		$blue = ($blue > 255) ? 255 : $blue;
		$blue = ($blue < 0) ? 0 : $blue;

		$out = New Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
		return ($out);
	}
}

?>