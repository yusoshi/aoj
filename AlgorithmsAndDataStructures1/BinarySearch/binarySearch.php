<?php
$sLen = intval(trim(fgets(STDIN)));
$s = explode(' ', trim(fgets(STDIN)));
$tLen = intval(trim(fgets(STDIN)));
$t = explode(' ', trim(fgets(STDIN)));
$count = 0;

for ($j = 0; $j < $tLen; $j++) {
    $left = 0;
    $right = $sLen;

    while ($left < $right) {
	$mid = floor(($left + $right) / 2);
	if ($s[$mid] === $t[$j]) {
	    $count++;
	    break;
	} else if ($s[$mid] > $t[$j]) {
	    $right = $mid;
	} else {
	    $left = $mid + 1;
	}
    }
}

echo $count . "\n";
