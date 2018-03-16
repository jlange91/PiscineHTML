#!/usr/bin/php
<?PHP
function ft_check_word($c1, $c2)
{
	$t1 = 0;
	$t2 = 0;

	if ($c1 >= 'a'  && $c1 <= 'z')
		$t1 = 1;
	else if ($c1 >= '0' && $c1 <= '9')
		$t1 = 2;
	else
		$t1 = 3;
	if ($c2 >= 'a'  && $c2 <= 'z')
		$t2 = 1;
	else if ($c2 >= '0' && $c2 <= '9')
		$t2 = 2;
	else
		$t2 = 3;
	if ($t1 - $t2 == 0)
	{
		if ($c1 == $c2)
			return (0);
		return ($c1 > $c2) ? -1 : 1;
	}
	else
		return ($t1 > $t2) ? -1 : 1;
} //si return negatif echanger les mots

function ft_sort_word($str1, $str2)
{
	$i = 0;
	$l1 = strlen($str1);
	$l2 = strlen($str2);
	$j = ($l1 > $l2) ? $l2 : $l1;

	$str1 = strtolower($str1);
	$str2 = strtolower($str2);
	while ($i < $j)
	{
		$ret = ft_check_word($str1[$i], $str2[$i]);
		if ($ret < 0)
			return (-1);
		if ($ret > 0)
			return (0);
		$i++;
	}
	return (0);
}

function ft_sort($tab)
{
	$len = count($tab);
	for ($i = 0; $i < $len - 1; $i++)
	{
		$ret = ft_sort_word($tab[$i], $tab[$i + 1]);
		if ($ret < 0)
		{
			$tmp = $tab[$i];
			$tab[$i] = $tab[$i + 1];
			$tab[$i + 1] = $tmp;
			$i = -1;
		}
	}
	return ($tab);
}
$tab = array();
$i = 0;
if ($argc < 2)
exit();
foreach($argv as $av)
{
	if ($i != 0)
	{
		$av = preg_split('/ /', $av, -1, PREG_SPLIT_NO_EMPTY);
		$tab = array_merge($tab, $av);
	}
	$i++;
}
$tab = ft_sort($tab);
foreach($tab as $w)
	echo $w . "\n";
?>