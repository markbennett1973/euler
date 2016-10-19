<?php

$date = 0;
$month = 1;
$year = 1900;
$day = 0; // Monday = 1

$sundayCount = 0;

while ($year < 2001) {
	// Increment the day number
	$day++;
	if ($day > 7) $day = 1;

	$date++;
	if ($date > daysInMonth($month, $year)) {
		$date = 1;
		$month++;
		if ($month > 12) {
			$month = 1;
			$year++;
		}
	}
	
	if ($year > 1900 && $day === 7 && $date === 1) {
		// print "$date of month $month $year is day $day\n";
		$sundayCount++;
	}
}

print "There were $sundayCount Sundays\n";
exit;

function daysInMonth($month, $year) {
	switch($month) {
		case 2:
			if ($year % 4 === 0 && ($year % 100 !== 0 || $year % 400 === 0)) {
				return 29;
			}
			else {
				return 28;
			}
			
		case 4:
		case 6:
		case 9:
		case 11:
			return 30;
			
		default:
			return 31;
	}
}