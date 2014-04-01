#!/usr/bin/php
<?php
// $handle = fopen("php://stdin", 'r');
function isInteger($input){
    return(ctype_digit(strval($input)));
}
while (42)
{
	echo "Entrez un nombre: ";
	if (($line = fgets(STDIN)) == FALSE)
	{
		echo "^D\n";
		break ;
	}
	$line = trim($line);
	if (isInteger($line))
	{
		if ($line % 2.00 == 0.00)
			echo "Le chiffre $line est Pair\n";
		else
			echo "Le chiffre $line est Impair\n";
	}
	else
		echo "'$line' n'est pas un chiffre\n";
}
?>