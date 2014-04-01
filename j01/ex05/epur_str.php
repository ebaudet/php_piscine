#!/usr/bin/php
<?php
	function multi_explode($delimiters, $string)
	{
		$ready = str_replace($delimiters, $delimiters[0], $string);
		$launch = explode($delimiters[0], $ready);
		return $launch;
	}

	function ft_split($string)
	{
		$tab = multi_explode(array(" ", "\t", "\n"), $string);
		for ($i = 0; isset($tab[$i]) ; $i++)
		{
			if ($tab[$i] == "")
				unset($tab[$i]);
		}
		$tab = array_merge($tab);
		return $tab;
	}

	function epur_str($string)
	{
		$tab = ft_split($string);
		for ($i = 0; isset($tab[$i]); $i++)
		{
			if ($i != 0)
				echo " ";
			echo "$tab[$i]";
		}
	}

if (isset($argv[1]))
{
	epur_str($argv[1]);
	echo "\n";
}

?>