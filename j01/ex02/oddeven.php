#!/usr/bin/php
<?php
$handle = fopen("php://stdin", 'r');
while (42)
{
	echo "Entrez un nombre: ";
	$line = trim(fgets($handle));
	if (feof($handle))
	{
		echo "^D\n";
		break ;
	}
	if (is_numeric($line))
	{
		if ($line %2 == 0)
			echo "Le chiffre $line est Pair\n";
		else
			echo "Le chiffre $line est Impair\n";
	}
	else
		echo "'$line' n'est pas un chiffre\n";
}
?>