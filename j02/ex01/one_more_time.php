#!/usr/bin/php
<?php
function array_for_reggex($tab)
{
	$string = "(";
	for ($i = 0; isset($tab[$i]); $i++)
	{
		if ($i != 0)
			$string = $string.")|(";
		$string = $string.$tab[$i];
	}
	$string = $string.")";
	return $string;
}

function array_equivalent($str, $tab_pattern, $tab_remplacement)
{
	for ($i = 0; isset($tab_pattern[$i]); $i++)
	{
		if (preg_match("/^".$tab_pattern[$i]."$/", $str) != 0)
			return $tab_remplacement[$i];
	}
	return FALSE;
}

function is_date($string)
{
	$month = array("[Jj]anvier", "[Ff][eé]vrier", "[Mm]ars", "[Aa]vril", "[Mm]ai", "[Jj]uin", "[Jj]uillet", "[Aa]o[uû]t", "[Ss]eptembre", "[Oo]ctrobre", "[Nn]ovembre", "[Dd]ecembre");
	$day = array("[Ll]undi", "[Mm]ardi", "[Mm]ercredi", "[Jj]eudi", "[Vv]endredi", "[Ss]amedi", "[Dd]imanche");
	$day_e = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$month_e = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$regex = "/^(".array_for_reggex($day).") ((0?[1-9])|([1-2][0-9])|(3[0-1])) (".array_for_reggex($month).")";
	$regex = $regex." [0-9]{4} ";
	$regex = $regex."(([01][0-9])|(2[0-3])):([0-5][0-9]):([0-5][0-9])$/";
	if (($result = preg_match($regex, $string)) === FALSE || $result == 0)
	{
		echo "Wrong Format\n";
		return ;
	}
	date_default_timezone_set("Europe/Paris");
	$date_test_tab = explode(" ", $string);
	$test1 = array_equivalent($date_test_tab[0], $day, $day_e);

	$date_test_tab[2] = array_equivalent($date_test_tab[2], $month, $month_e);
	$date_test_tab = array_slice($date_test_tab, 1);
	$date_test = implode(" ", $date_test_tab);
	$timestamp = strtotime($date_test);

	$test2 = jddayofweek(unixtojd($timestamp), 1);
	if ($test1 == $test2)
		echo "$timestamp\n";
	else
		echo "Wrong Format\n";
}

if ($argc == 2)
	is_date($argv[1]);

?>