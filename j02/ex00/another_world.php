#!/usr/bin/php
<?php

function trim_string($str)
{
	$str = trim($str);
	$str = str_replace("\t", " ", $str);
	$str = preg_replace("/[ ]+/", " ", $str);
	return $str;
} 

echo trim_string($argv[1])."\n";

?>