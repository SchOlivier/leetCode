<?php

$tests = ["3", "59", "1994"];
foreach ($tests as $test) {
    echo $test . "\t: " . intToRoman($test) . "\n";
}

/**
 * Given an integer, convert it to a roman numeral.
 */
function intToRoman($num)
{
    $romanSimplified = '';

    $values = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I'
    ];

    // simple substitution first
    foreach ($values as $key => $value) {
        while ($num >= $key) {
            $romanSimplified .= $value;
            $num -= $key;
        }
    }

    // Replace substractions by additions
    $additions = ['VIIII', 'IIII', 'LXXXX', 'XXXX', 'DCCCC', 'CCCC'];
    $substractions = ['IX', 'IV', 'XC', 'XL', 'CM', 'CD'];
    $roman = str_replace($additions, $substractions, $romanSimplified);

    return $roman;
}
