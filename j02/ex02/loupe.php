#!/usr/bin/php
<?php
function maj_link($str)
{
	$regex = "/<a[^>]*title=\"(.*)\".*>/";
	if (($val = preg_match_all($regex, $str, $regs, PREG_PATTERN_ORDER)) === 1)
	{
		$tab = explode($regs[1][0], $str);
		$str = implode(strtoupper($regs[1][0]), $tab);
	}
	$regex = "/<a [^>]*>([^<]*).*<\/a>/";
	if (($val = preg_match_all($regex, $str, $regs, PREG_PATTERN_ORDER)) === 1)
	{
		$tab = explode($regs[1][0], $str);
		$str = implode(strtoupper($regs[1][0]), $tab);
	}
	$regex = "/<a [^>]*>[^<]*<.*title=\"(.*)\".*<\/a>/";
	if (($val = preg_match_all($regex, $str, $regs, PREG_PATTERN_ORDER)) === 1)
	{
		$tab = explode($regs[1][0], $str);
		$str = implode(strtoupper($regs[1][0]), $tab);
	}
	echo $str;
}

if (!isset($argv[1]))
	exit ;
if (($fd = fopen($argv[1], 'r')) == FALSE)
	exit ;
while ($line = fgets($fd))
{
	maj_link($line);
}
fclose($fd);
?>