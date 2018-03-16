#!/usr/bin/php
<?php

if ($argc > 2)
{
	$i = 2;
	while ($i < $argc)
	{
		$tab = preg_split('/:/', $argv[$i], -1, PREG_SPLIT_NO_EMPTY);
		if (count($tab) == 2)
		{
			if (strcmp($argv[1], $tab[0]) == 0)
			{
				$ret = $tab[1];
			}
		}
		$i++;
	}
	if ($ret)
		echo $ret . "\n";
}

?>