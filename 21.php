<?php

$divisors = getDivisorsList(10000);
$pairs = findPairs($divisors);

$sum = 0;
foreach ($pairs as $pair) {
	$sum += $pair;
}

print "Sum = $sum\n";

function getDivisorsList($limit) {
	$divisors = [];
	
	if ($limit < 1) {
		return $divisors;
	}

	for($i = 1; $i < $limit; $i++) {
		$divisors[$i] = getDivisorsSum($i);
	}

	return $divisors;
}


function getDivisorsSum($target) {
	$sum = 0;
	
	if ($target < 1) {
		return $sum;
	}
	
	$limit = ceil(sqrt($target));
	for($i = 1; $i < $limit; $i++) {
		if ($target % $i === 0) {
			$sum += $i;
			if ($i > 1) {
				$sum += $target/$i;
			}
		}
	}
	
	return $sum;
}

function findPairs($list) {
	$pairs = [];
	
	foreach ($list as $key => $value) {
		if ($key != $value && array_key_exists($value, $list) && $list[$value] == $key) {
			$pairs[] = $key;
		}
	}
	
	return $pairs;
}