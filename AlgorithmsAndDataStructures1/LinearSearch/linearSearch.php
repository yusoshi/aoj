<?php
$sLen = intval(trim(fgets(STDIN)));
$s = explode(' ', trim(fgets(STDIN)));
$tLen = intval(trim(fgets(STDIN)));
$t = explode(' ', trim(fgets(STDIN)));
$count = 0;

for ($j = 0; $j < $tLen; $j++) {
    $i = 0;    
    $s[$sLen] = $t[$j];

    while ($s[$i] !== $t[$j]) {
	$i++;
    }
    if ($i !== $sLen) {
	$count++;
    }
}

echo $count . "\n";
