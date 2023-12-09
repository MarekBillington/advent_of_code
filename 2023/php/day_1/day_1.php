<?php

function process($part) {
    $raw = file_get_contents(__DIR__.'/data.txt');

    $split = explode("\n", $raw);

    $sum = 0;

    if (1 == $part) {
        foreach ($split as $value) {
            $matches = [];
            preg_match_all("(\d)", $value, $matches);
        
            $m = $matches[0];
            $f = $m[0];
            $e = $m[array_key_last($m)];
        
            $s = intval($f.$e);
            $sum += $s;
        }
    } else if (2 == $part) {
        foreach ($split as $value) {
            $m = [];
            $digits = ['one' => 1,'two' => 2,'three' => 3,'four' =>4,'five'=>5,'six'=>6,'seven'=>7,'eight'=>8,'nine'=>9];

            // check over each option and push into array with index as key...
            foreach ($digits as $k => $v) {
                // look forwards
                $posV = strpos($value, $v);
                $posK = strpos($value, $k);
                if (false !== $posV)
                    $m[$posV] = $v;
                if (false !== $posK)
                    $m[$posK] = $v;

                // look backwards
                $posV = strrpos($value, $v);
                $posK = strrpos($value, $k);
                if (false !== $posV)
                    $m[$posV] = $v;
                if (false !== $posK)
                    $m[$posK] = $v;
                    
            }
        
            ksort($m);
            print_r($m);
            $f = $m[array_key_first($m)];
            $e = $m[array_key_last($m)];
        
            $s = intval($f.$e);
            print_r($s."\n");
            $sum += $s;
        }
    }

    return $sum;
}

echo "part 1: ".process(1)."\n";
echo "part 2: ".process(2)."\n";
