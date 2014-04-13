<?php

class Weapon {

  protected $_charges;
  protected $_shortRange;
  protected $_mediumRange;
  protected $_longRange;
  protected $_effectzone;
  protected $_special;
  protected $_notes;

  public function getCharges() { return $this->_charges; } 
  public function getShortRange() { return $this->_shortRange; }
  public function getMediumRange() { return $this->_mediumRange; }
  public function getLongRange() { return $this->_longRange; }
  public function getEffectzone() { return $this->_effectzone; }
  public function getSpecial() { return $this->_special; }
  public function getNotes() { return $this->_notes; }
  
  public function setCharges($v) {
    $this->_charges = $v; 
  }
  public function setShortRange($v) {
    $this->_shortRange = $v; 
  }
  public function setMediumRange($v) {
    $this->_mediumRange = $v; 
  }
  public function setLongRange($v) {
    $this->_longRange = $v; 
  }
  public function setEffectzone($v) {
    $this->_effectzone = $v; 
  }
  public function setSpecial($v) {
    $this->_special = $v; 
  }
  public function setNotes($v) {
    $this->_notes = $v; 
  }

  public function __construct(array $tab) {
    if (array_key_exists('charges', $tab))
      $this->_charges = $tab['charges'];
    if (array_key_exists('shortRange', $tab))
      $this->_shortRange = $tab['shortRange'];
    if (array_key_exists('_mediumRange', $tab))
      $this->_mediumRange = $tab['mediumRange'];
    if (array_key_exists('longRange', $tab))
      $this->_longRange = $tab['longRange'];
    if (array_key_exists('effectzone', $tab))
      $this->_effectzone = $tab['effectzone'];
    if (array_key_exists('special', $tab))
      $this->_special = $tab['special'];
    if (array_key_exists('notes', $tab))
      $this->_notes = $tab['notes'];
  }

  public static function doc() {
    echo file_get_contents('Weapon.doc.txt');
    return ;
  }

  public function __toString() {
    return $this->_charges . ", " . $this->_shortRange . ", " . $this->_mediumRange . ", " . $this->_longRange . ", " . $this->_effectzone . ", " . $this->_special . ", " . $this->_notes;

  }

  public function __destruct() { return ; }
}
?>
