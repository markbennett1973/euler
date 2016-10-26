<?php

$target = 100;
$factorial = 1;

for($i = 1; $i <= $target; $i++) {
	$factorial = bcmul($factorial, $i);
}

$sum = 0;

for($i = 0; $i < strlen($factorial); $i++) {
	$sum += $factorial[$i];
}

print "$target! = $factorial\n";
print "Sum = $sum\n";