#!/usr/bin/php
<?php

function ft_is_sort($array1)
{
	$i = 0;
	$ret = true;
	$array2 = $array1;
	array_multisort($array2, SORT_ASC, SORT_REGULAR);
	foreach($array2 as $arg)
	{
		if ($arg != $array1[$i])
			$ret = false;
		$i++;
	}
	return $ret;
}

?>
