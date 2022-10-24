<?php

$tests = ["III", "LVIII", "MCMXCIV"];
foreach($tests as $test){
    echo $test . "\t: " . romanToInt($test) . "\n";
}

/**
 * Given a roman numeral, convert it to an integer.
 */
function romanToInt($s)
{
    if (strlen($s) == 0) return 0;

    $values = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    // Replace substractions by additions
    $substractions = ['IV', 'IX', 'XL', 'XC', 'CD', 'CM'];
    $additions = ['IIII', 'VIIII', 'XXXX', 'LXXXX', 'CCCC', 'DCCCC'];
    $romanSimplified = str_replace($substractions, $additions, $s);

    // Add all values one by one
    $int = 0;
    foreach (str_split($romanSimplified) as $letter) {
        $int += $values[$letter];
    }
    return $int;
}
