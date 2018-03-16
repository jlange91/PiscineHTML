#!/usr/bin/php
<?PHP

$i = 0;

foreach($argv as $av)
{
	if ($i != 0)
		echo $av . "\n";
	$i++;
}

?>
