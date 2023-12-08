<?php

$raw = file_get_contents(__DIR__.'/data.txt');

$split = explode("\n", $raw);

$sum = 0;
foreach ($split as $value) {
    $matches = [];
    preg_match_all("(\d)", $value, $matches);

    $m = $matches[0];
    
    $f = $m[0];
    $e = $m[array_key_last($m)];

    $s = intval($f.$e);
    $sum += $s;
}

echo $sum;
