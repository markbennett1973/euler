<?php

const LIMIT = 28123;

// 1. find all abundant numbers
// 2. for each number
//      can it be made by adding two abundant numbers?
//
// Run with "php -n" to disable all ini files for fastest speed!

$abundantNumbers = getAllAbundantNumbers();
print "Found " . count($abundantNumbers) . "\n";

$sums = getAllSums($abundantNumbers);
$sum = 0;
for($i = 1; $i <= LIMIT; $i++) {
	if (!array_key_exists($i, $sums)) {
		$sum += $i;
	}
}

print "Final sum = $sum\n";

function getAllAbundantNumbers()
{
	$abundantNumbers = [];
	for($i = 1; $i <= LIMIT; $i++) {
		if (isAbundant($i)) {
			$abundantNumbers[] = $i;
		}
	}
	
	return $abundantNumbers;
}

function isAbundant($number)
{
	$divisors = getDivisors($number);
	$divisorSum = array_sum($divisors);
	return $divisorSum > $number;
}

function getDivisors($number)
{
	$divisors[] = 1;
	$limit = sqrt($number);
	
	for($i = 2; $i <= $limit; $i++) {
		if ($number % $i === 0) {
			$divisors[] = $i;
			$otherDivisor = $number / $i;
			if ($i !== $otherDivisor) {
				$divisors[] = $otherDivisor;
			}
		}
	}
	
	return $divisors;
}

function getAllSums($abundantNumbers)
{
	$abundantCount = count($abundantNumbers);

	$sums = [];
	for($firstIndex = 0; $firstIndex < $abundantCount; $firstIndex++) {
		$firstAbundantNumber = $abundantNumbers[$firstIndex];
		for($secondIndex = $firstIndex; $secondIndex < $abundantCount; $secondIndex++) {
			$secondAbundantNumber = $abundantNumbers[$secondIndex];
			$sums[$firstAbundantNumber + $secondAbundantNumber] = 0;
		}
	}
	
	return $sums;
}