<?php

/* Full size data set */
$rows = [];
$rows[] = [75];
$rows[] = [95, 64];
$rows[] = [17, 47, 82];
$rows[] = [18, 35, 87, 10];
$rows[] = [20, 04, 82, 47, 65];
$rows[] = [19, 01, 23, 75, 03, 34];
$rows[] = [88, 02, 77, 73, 07, 63, 67];
$rows[] = [99, 65, 04, 28, 06, 16, 70, 92];
$rows[] = [41, 41, 26, 56, 83, 40, 80, 70, 33];
$rows[] = [41, 48, 72, 33, 47, 32, 37, 16, 94, 29];
$rows[] = [53, 71, 44, 65, 25, 43, 91, 52, 97, 51, 14];
$rows[] = [70, 11, 33, 28, 77, 73, 17, 78, 39, 68, 17, 57];
$rows[] = [91, 71, 52, 38, 17, 14, 91, 43, 58, 50, 27, 29, 48];
$rows[] = [63, 66, 04, 68, 89, 53, 67, 30, 73, 16, 69, 87, 40, 31];
$rows[] = [04, 62, 98, 27, 23, 09, 70, 98, 73, 93, 38, 53, 60, 04, 23];

/* Small data set
$rows = [];
$rows[] = [3];
$rows[] = [7, 4];
$rows[] = [2, 4, 6];
$rows[] = [8, 5, 9, 3];
*/

$maxSum = 0;

for ($path = 0; $path < pow(2, count($rows) - 1); $path++) {
	$pathSum = getPathSum($rows, $path);
	if ($pathSum > $maxSum) {
		$maxSum = $pathSum;
	}
}

print "Max sum = $maxSum\n";
exit;

function getPathSum($rows, $path) {
	// We will always include the first row in the sum
	$sum = $rows[0][0];

	$column = 0;
	for ($row = 1; $row < count($rows); $row++) {
		// If bit[$row] in $path = 0
		//   leave column alone
		// else 
		//    column++
		$check = pow(2, $row - 1);
		if ($path & $check) {
			$column++;
		}

		$sum += $rows[$row][$column];
	}
	
	return $sum;
}