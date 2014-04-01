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

	function print_tab($tab)
	{
		for ($i = 0; isset($tab[$i]); $i++)
		{
			if ($i != 0)
				echo " ";
			echo $tab[$i];
		}
	}

	function rostring($string)
	{
		$tab = ft_split($string);
		array_push($tab, $tab[0]);
		unset($tab[0]);
		$tab = array_merge($tab);
		print_tab($tab);
		echo "\n";
	}
	rostring($argv[1]);
?>