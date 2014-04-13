<?php

class	Displaygrid
{
	public $board;
	public $grid_width  = 100; // largeur de la grille
	public $grid_height = 150; // hauteur de la grille
	public $cell_width  = 10; // largeur d'une cellule
	public $cell_height = 10; // hauteur d'une cellule
	public $gutter      = 1;

	public function __construct($kwargs)
	{
		if (array_key_exists('height', $kwargs) && array_key_exists('width', $kwargs))
		{
			$this->grid_height = $kwargs['height'];
			$this->grid_width = $kwargs['width'];
			$this->board = array();
			$row = $this->grid_height;
			while ($row != 0)
			{
				$this->board[] = array();
				$col = $this->grid_width;
				while ($col != 0)
				{
					$this->board[$row][$col] = array(0, 0, 0);
					$col--;
				}
				$row--;
			}
		}
	}

	public function display()
	{
		$row = 1;
		echo "<table>\n";
		while ($row != $this->grid_height)
		{
			$col = 1;
			echo "<tr class=\"row\">";
			while ($col != $this->grid_width)
			{
				print ('<td class="cell"></td>' . "\n" );
				$col++;
			}
			echo "</tr>";
			$row++;
		}
	}
	public static function doc() {
		echo file_get_contents('Displaygrid.doc.txt');
		return ;
	}

}
?>