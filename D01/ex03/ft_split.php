#!/usr/bin/php
<?PHP

function ft_split($str)
{
	$ret = preg_split('/ /', $str, -1, PREG_SPLIT_NO_EMPTY);
	array_multisort($ret, SORT_ASC, SORT_REGULAR);
	return $ret;
}

?>
