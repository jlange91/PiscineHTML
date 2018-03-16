#!/usr/bin/php
<?PHP

while (1)
{
	echo "Entrez un nombre: ";
	$line = fgets(STDIN);
	if (!$line)
	{
		echo "\n";
		exit();
	}
	$line = substr($line, 0, -1);
	if (!is_numeric($line))
		echo "'$line' n'est pas un chiffre\n";
	else
	{
		$tmp = $line;
		$line = substr($line, -1);
		if ($line % 2)
			echo "Le chiffre $tmp est Impair\n";
		else
			echo "Le chiffre $tmp est Pair\n";
	}
}

?>
