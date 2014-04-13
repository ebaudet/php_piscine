<?php

require_once("Displaygrid.class.php");
$board = new Displaygrid(array( 'height' => 150, 'width' => 100));
?>


<?php $board->display(); ?>