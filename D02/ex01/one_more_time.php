#!/usr/bin/php
<?PHP

date_default_timezone_set('UTC');

if ($argc != 2)
	exit();

function find_month($month)
{
	$ret = 0;

	if (preg_match('/[Jj]anvier/', $month))
		$ret = 1;
	else if (preg_match('/[Ff][ée]vrier/', $month))
		$ret = 2;
	else if (preg_match('/[Mm]ars/', $month))
		$ret = 3;
	else if (preg_match('/[aA]vril/', $month))
		$ret = 4;
	else if (preg_match('/[mM]ai/', $month))
		$ret = 5;
	else if (preg_match('/[jJ]uin/', $month))
		$ret = 6;
	else if (preg_match('/[jJ]uillet/', $month))
		$ret = 7;
	else if (preg_match('/[aA]o[ûu]t/', $month))
		$ret = 8;
	else if (preg_match('/[sS]eptembre/', $month))
		$ret = 9;
	else if (preg_match('/[oO]ctobre/', $month))
		$ret = 10;
	else if (preg_match('/[nN]ovembre/', $month))
		$ret = 1;
	else if (preg_match('/[dD][ée]cembre/', $month))
		$ret = 12;
	return $ret;
}

function display($tab)
{
	$time = preg_split('/:/', $tab[4], -1, PREG_SPLIT_NO_EMPTY);
	if (count($time) == 3)
		echo mktime($time[0], $time[1], $time[2], find_month($tab[2]), $tab[1], $tab[3]);
	else
		echo "Wrong format\n";
}

$tab = preg_split('/ /', $argv[1], -1, PREG_SPLIT_NO_EMPTY);
if (count($tab) == 5)
{
	if (preg_match("/[lL]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche/", $tab[0])
				&& preg_match("/[0-9]{2}/", $tab[1])
				&& preg_match("/[jJ]anvier|[fF][ée]vrier|[mM]ars|[aA]vril|[mM]ai|[jJ]uin|[jJ]uillet|[aA]o[ûu]t|[sS]eptembre|[oO]ctobre|[nN]ovembre|[dD][ée]cembre/", $tab[2])
				&& preg_match("/[0-9]{4}/", $tab[3]) && preg_match("/[0-9]{2}:[0-9]{2}:[0-9]{2}/", $tab[4]))
	{
		display($tab);
	}
	else
		echo "Wrong format\n";

}
else
	echo "Wrong format\n";

?>