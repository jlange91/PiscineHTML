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

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}

$tmp = preg_split('/\+|-|\*|\/|%/', $argv[1], -1, PREG_SPLIT_NO_EMPTY);

if (count($tmp) != 2)
{
	echo "Syntax Error\n";
	exit();
}
$tab1 = preg_split('/ /', $tmp[0], -1, PREG_SPLIT_NO_EMPTY);
$tab2 = preg_split('/ /', $tmp[1], -1, PREG_SPLIT_NO_EMPTY);
$tab = array_merge($tab1, $tab2);
if (!is_numeric($tab[0]) || !is_numeric($tab[1]))
{
	exit();
}
if (count($tab) != 2)
{
	echo "Syntax Error\n";
	exit();
}
if (strpos($argv[1], "+"))
	$opt = 0;
else if (strpos($argv[1], "-"))
	$opt = 1;
else if (strpos($argv[1], "*"))
	$opt = 2;
else if (strpos($argv[1], "/"))
	$opt = 3;
else if (strpos($argv[1], "%"))
	$opt = 4;
$ret = ft_calc($tab[0], $tab[1], $opt);
echo $ret . "\n";

?>