#!/usr/bin/php
<?php
/* OBJECTIF :
<html><head><title>Nice page</title></head>
<body>Hello World <a href=http://cyan.com title="un lien">Ceci est un lien</a>
<br /><a href=http://www.riven.com> Et ca aussi <img src=wrong.image title="et encore ca"></a>
</body></html>
*/

/*
<html><head><title>Nice page</title></head>
<body>Hello World <a href=http://cyan.com title="UN LIEN">CECI EST UN LIEN</a>
<br /><a href=http://www.riven.com> ET CA AUSSI <img src=wrong.image title="ET ENCORE CA"></a>
</body></html>
*/
function maj_link($str)
{
	$regex = "/(((.)*<a(.)*title=\")((.)*)(\"(.)*>)((.)*)(<\/a>(.)*))+/";
	$regex = "/((.*<a.*?)(title=\"(.*)\")?(>)(.*)(<.*?))+/";
	$val = preg_match_all($regex, $str, $regs, PREG_PATTERN_ORDER);
	print_r($regs);
	/*for ($i = 0; isset($regs[$i]); $i++)
	{
		echo $i." : ".$regs[$i][0]."\n";
	}
	$regs[5][0] = strtoupper($regs[5][0]);
	$regs[9][0] = strtoupper($regs[9][0]);*/

	// echo $regs[2][0].strtoupper($regs[5][0]).$regs[7][0].strtoupper($regs[9][0]).$regs[11][0];
	/*for ($i = 1; isset($regs[$i]); $i++)
	{
		echo $regs[$i][0];
	}*/
}

if (!isset($argv[1]))
	exit ;
if (($fd = fopen($argv[1], 'r')) == FALSE)
	exit ;
while ($line = fgets($fd))
{
	echo $line;
	maj_link($line);
	echo "\n\n";
}
fclose($fd);
?>

(((.)*<a(.)*title=\")((.)*)(\"(.)*>)((.)*)(<\/a>(.)*))+