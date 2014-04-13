<?php
require_once("weapons/Weapon.class.php");
class HeavyMachineGun extends Weapon
{
	protected $_notes = "Effect zone : Same as the range";
	protected $_charges = 5;
	protected $_shortRange = 1;
	protected $_mediumRange = 4;
	protected $_longRange = 8;
	protected $_effectzone = 10;
}

?>
