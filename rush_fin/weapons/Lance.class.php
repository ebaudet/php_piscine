<?php
require_once("weapons/Weapon.class.php");
class Lance extends Weapon
{
	protected $_notes = "Effect zone : 1 line or column depends on the ship orientation. Min range: 1, Max : 30";
	protected $_charges = 0;
	protected $_shortRange = 1;
	protected $_mediumRange = 11;
	protected $_longRange = 21;
	protected $_effectzone = 30;
}

?>