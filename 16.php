<?php

$digits = powerTwo(1000);
print_r($digits);
$sum = 0;
foreach ($digits as $digit) {
	$sum += $digit;
}

print "Sum = $sum\n";
die;

/**
 * Calculate a power of two
 * @param int $power
 *   The power of two to calculate
 * @return string
 */
function powerTwo($power) {
	$current = [1];
	for ($i = 0; $i < $power; $i++) {
		$current = doubleValue($current);
	}
	
	return $current;
}

/**
 * Double a value
 * @param array $value
 *    The value to double, passed as an array of digits so we can handle massive numbers
 *    $value[0] is the least significant digit
 *
 * @return array
 *    The result as an array of digits so we can handle massive numbers
 */
function doubleValue(array $value) {
	$result = [];
	$carry = 0;
	$index = 0;
	
	$limit = count($value) - 1;
	while ($index <= $limit) {
		$digit = $value[$index];
		$doubled = ($digit * 2) + $carry;
		if ($doubled > 9) {
			$result[$index] = $doubled - 10;
			$carry = 1;
		}
		else {
			$result[$index] = $doubled;
			$carry = 0;
		}
		
		$index++;
	}
	
	if ($carry > 0) {
		$result[] = $carry;
	}
	
	return $result;
}