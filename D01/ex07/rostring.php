#!/usr/bin/php
<?php

function print_tab($tab)
{
	$i = count($tab);
	$j = 1;
	foreach($tab as $word)
	{
		echo $word;
		echo ($j == $i) ? "\n" : " ";
		$j++;
	}
}

if ($argc < 2)
	exit();
$str = $argv[1];
$tab = preg_split('/ /', $str, -1, PREG_SPLIT_NO_EMPTY);
$i = count($tab);
if ($i == 0)
	exit();
$begin = $tab[0];
for($j = 0; $j < $i - 1; $j++)
	$tab[$j] = $tab[$j + 1];
$tab[$i - 1] = $begin;
print_tab($tab);

?>