<?php

$namesList = file_get_contents('names.txt');
$names = array_map(function($value) {return trim($value, '"'); }, explode(',', $namesList));
sort($names);

$sum = 0;
foreach ($names as $index => $name) {
	$sum += getScore($name, $index + 1);
}

print "Sum = $sum\n";

function getScore($name, $position) {
	$letterSum = 0;
	for($i = 0; $i < strlen($name); $i++) {
		$letterSum += (ord($name[$i]) - 64);
	}
	
	return $letterSum * $position;
}