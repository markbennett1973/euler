<?php

$numberWords = [
	1 => 'one',
	2 => 'two',
	3 => 'three',
	4 => 'four',
	5 => 'five',
	6 => 'six',
	7 => 'seven',
	8 => 'eight',
	9 => 'nine',
	10 => 'ten',
	11 => 'eleven',
	12 => 'twelve',
	13 => 'thirteen',
	14 => 'fourteen',
	15 => 'fifteen',
	16 => 'sixteen',
	17 => 'seventeen',
	18 => 'eighteen',
	19 => 'nineteen',
	20 => 'twenty',
	30 => 'thirty',
	40 => 'forty',
	50 => 'fifty',
	60 => 'sixty',
	70 => 'seventy',
	80 => 'eighty',
	90 => 'ninety',
	100 => 'hundred',
	1000 => 'thousand',
];

$totalLength = 0;
for ($number = 1; $number <= 1000; $number++) {
	$words = getWords($number);
	
	foreach ($words as $word) {
		$totalLength += strlen($word);
	}
}

print "Total length = $totalLength\n";
exit;

// Get the words making up a number
function getWords($number) {
	global $numberWords;
	
	$words = [];
	if ($number >= 1000) {
		$thousands = ($number - ($number % 1000)) / 1000;
		$words = getWords($thousands);
		$words[] = 'thousand';
		
		$number = $number - ($thousands * 1000);
	}
	
	if ($number >= 100) {
		$hundreds = ($number - ($number % 100)) / 100;
		$words[] = $numberWords[$hundreds];
		$words[] = 'hundred';
		
		$number = $number - ($hundreds * 100);
		if ($number > 0) {
			$words[] = 'and';
		}
	}
	
	if ($number >= 20) {
		$tens = ($number - ($number % 10)) / 10;
		$words[] = $numberWords[$tens * 10];
		
		$number = $number - ($tens * 10);
	}
	
	if ($number > 0) {
		$words[] = $numberWords[$number];
	}
	
	return $words;
}

