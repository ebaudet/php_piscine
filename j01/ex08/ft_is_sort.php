<?php
	function ft_is_sort($tab)
	{
		for ($i = 1; isset($tab[$i]); $i++)
		{
			if ($tab[$i] < $tab[$i - 1])
				return false;
		}
		return true;
	}
?>