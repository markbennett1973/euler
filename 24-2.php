<?php

/**
 * Second attempt, using a smarter algorithm to get the next permutation
 * http://www.quickperm.org/soda_submit.php
 */
const NUMBER_OF_DIGITS  = 10;
const INDEX_TO_GET = 1000000;

// Initialise array of digits
for ($i = 0; $i < 10; $i++) {
	$digits[] = $i;
}

for ($i = 1; $i < INDEX_TO_GET; $i++) {
	$digits = next_perm($digits);
}

print implode('', $digits) . "\n";
exit;

/**
 * Get next permutation using SEPA algorithm: http://www.quickperm.org/soda_submit.php
 */
function next_perm($digits) {
	// We'll use this a lot, so store it as a variable
	$length = count($digits);
	
	// First find key
	$key = -1;
	for ($i = $length - 1; $i > 0; $i--) {
		if ($digits[$i-1] < $digits[$i]) {
			$key = $i - 1;
			break;
		}
	}
	
	if ($key === -1) {
		die("No more permutations available\n");
	}
	
	// Now find the element to swap the key with
	$best = null;
	for ($i = $key+1; $i < $length; $i++) {
		if ($digits[$i] > $digits[$key]) {
			if ($best === null || $digits[$i] < $digits[$best]) {
				$best = $i;
			}
		}
	}
	
	if ($best === null) {
		die("No best swap found\n");
	}

	// Swap the key with the best match
	$tmp = $digits[$key];
	$digits[$key] = $digits[$best];
	$digits[$best] = $tmp;

	// Finally, sort the tail
	$head = array_slice($digits, 0, $key);
	$tail = array_slice($digits, $key + 1, $length - $key - 1);
	asort($tail);
 	
 	$digits = array_merge($head, [$digits[$key]], $tail);
 	
	return $digits;
}