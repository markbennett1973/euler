<?php

/**
 * First attempt using my own brute-force algorithm
 * It works, but took 40 minutes to get to the right answer!
 */
$matched = 0;
$current = 123456789;
$count = 0;

while ($current <= 9876543210) {
	if (is_perm($current)) {
		$matched++;
	}

	if ($matched == 1000000) {
		print "Found match: $current\n";
		break;
	}

	$current++;
	$count++;
	
	if ($count % 1000000 === 0) {
		print "Checked $count, found $matched so far\n";
	}	
}

exit;

function is_perm($number) {
	// Split into individual digits
	$digits = str_split($number);
	
	// If it was only a 9 digit number, add a zero to represent the leading zero
	if (count($digits) === 9) {
		$digits[] = 0;
	}
	
	return count(array_flip($digits)) === 10;
}