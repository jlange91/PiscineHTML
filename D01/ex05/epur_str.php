#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$ret = preg_split('/ /', $str, -1, PREG_SPLIT_NO_EMPTY);
	return $ret;
}

if ($argc < 2)
	exit();
$str = $argv[1];
$str = ft_split($str);
$i = 0;
$nb = count($str) - 1;
foreach($str as $word)
{
	echo $word;
	echo ($i == $nb) ? "\n" : " ";
	$i++;
}

?>
