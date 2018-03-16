#!/usr/bin/php
<?PHP

function ft_calc($nb1, $nb2, $opt)
{
	$ret = 0;
	if ($opt == 0)
		$ret = $nb1 + $nb2;
	else if ($opt == 1)
		$ret = $nb1 - $nb2;
	else if ($opt == 2)
		$ret = $nb1 * $nb2;
	else if ($opt == 3)
		$ret = $nb1 / $nb2;
	else if ($opt == 4)
		$ret = $nb1 % $nb2;
	return $ret;
}

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}

$tab = preg_split('/ /', $argv[2], -1, PREG_SPLIT_NO_EMPTY);
if (count($tab) != 1)
{
	echo "Syntax Error\n";
	exit();
}
$opt = 0;
if ($tab[0] == "+")
	$opt = 0;
else if ($tab[0] == "-")
	$opt= 1;
else if ($tab[0] == "*")
	$opt= 2;
else if ($tab[0] == "/")
	$opt= 3;
else if ($tab[0] == "%")
	$opt= 4;
else
{
	echo "Syntax Error";
	exit();
}
$test =  ft_calc($argv[1], $argv[3], $opt);
echo $test . "\n";

?>
