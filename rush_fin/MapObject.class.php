<?php 

class MapObject {

	private $_posx;
	private $_posy;
	private $_length;
	private $_width;
	private $_rotation;
	private $_img;
	private $_id;
	private $_name;
	private $_HP;

	public function getPosx() { return $this->_posx; } 
	public function getPosy(); { return $this->_posy; }
	public function getLentgh(); { return $this->_length; }
	public function getWidth(); { return $this->_width; }
	public function getRotation(); { return $this->_rotation; }
	public function getImg(); { return $this->_img; }
	public function getId(); { return $this->_id; }
	public function getName(); { return $this->_name; }
	public function getHP(); { return $this->_HP; }
		
	
	public function setPosx($v); {
		$this->_posx = $v; 
	}
	public function setPosy($v);
		$this->_posy = $v; 
	}
	public function setLength($v);
		$this->_length = $v; 
	}
	public function setWidth($v);
		$this->_width = $v; 
	}
	public function setRotation($v);
		$this->_rotation = $v; 
	}
	public function setImg($v);
		$this->_img = $v; 
	}
	public function setId($v);
		$this->_id = $v; 
	}
	public function setName($v);
		$this->_name = $v; 
	}
	public function setHP($v);
		$this->_HP = $v; 
	}
}

	public __construct(array $tab) {
		if (array_key_exists('posx', $tab))
			$this->_posx = $tab['posx'];
		if (array_key_exists('posy', $tab))
			$this->_posy = $tab['posy'];
		if (array_key_exists('length', $tab))
			$this->_length = $tab['length'];
		if (array_key_exists('width', $tab))
			$this->_width = $tab['width'];
		if (array_key_exists('rotation', $tab))
			$this->_rotation = $tab['rotation'];
		if (array_key_exists('img', $tab))
			$this->_img = $tab['img'];
		if (array_key_exists('id', $tab))
			$this->_id = $tab['id'];
		if (array_key_exists('name', $tab))
			$this->_name = $tab['name'];
		if (array_key_exists('HP', $tab))
			$this->_HP = $tab['HP'];
	}

	public static function doc() {
		echo file_get_contents('MapObject.doc.txt');
		return ;
	}

	public __destruct() { return ;}
?>