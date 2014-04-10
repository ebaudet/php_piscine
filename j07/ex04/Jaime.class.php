<?php

class Jaime extends Lannister {
	public function sleepWith($class)
	{
		if (get_class($class) == "Cersei")
			echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
		else
			parent::sleepWith($class);
	}
}

?>