<?php
require_once("weapons/Weapon.class.php");
class MacroCanon extends Weapon
{
    protected $_notes = "Effect zone : 1 line depends on ship orientation and 9 blocks of diameter explosion";
    protected $_charges = 0;
	protected $_shortRange = 1;
	protected $_mediumRange = 11;
	protected $_longRange = 21;
	protected $_effectzone = 30;
}

?>
