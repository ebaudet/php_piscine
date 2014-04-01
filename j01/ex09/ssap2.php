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
		for ($i = 0; isset($tab[$i][0]); $i++)
			echo $tab[$i][0]."\n";
	}

	function ssap2($argv)
	{
		$tab = array();
		for ($i = 1; isset($argv[$i]); $i++)
		{
			$tmp = ft_split($argv[$i]);
			for ($j = 0; isset($tmp[$j]); $j++)
				array_push($tab, ft_split($tmp[$j]));
		}
		sort($tab);
		print_tab($tab);
	}
	ssap2($argv);
?>