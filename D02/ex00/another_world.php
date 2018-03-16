#!/usr/bin/php
<?PHP

$str = preg_replace('/\t/', ' ', $argv[1]);
$tab = preg_split('/ /', $str, -1, PREG_SPLIT_NO_EMPTY);
$j = count($tab);
$i = 0;
foreach ($tab as $key => $value) {
	echo ($i == $j - 1	) ? $value . "\n" : $value . ' ';
	$i++;
}

?>