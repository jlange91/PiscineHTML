#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$ret = preg_split('/ /', $str, -1, PREG_SPLIT_NO_EMPTY);
	array_multisort($ret, SORT_ASC, SORT_REGULAR);
	return $ret;
}

$tab = array();
$i = 0;

if ($argc < 2)
	exit();

foreach($argv as $av)
{
	if ($i != 0)
	{
		$av = ft_split($av);
		$tab = array_merge($tab, $av);
	}
	$i++;
}
array_multisort($tab, SORT_ASC, SORT_REGULAR);
foreach($tab as $word)
	echo $word . "\n";

?>
