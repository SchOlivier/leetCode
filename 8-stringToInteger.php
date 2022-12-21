<?php
class Solution
{
    /*
    Implement the myAtoi(string s) function, which converts a string to a 32-bit signed integer (similar to C/C++'s atoi function).

    The algorithm for myAtoi(string s) is as follows:

    Read in and ignore any leading whitespace.
    Check if the next character (if not already at the end of the string) is '-' or '+'. Read this character in if it is either. This determines 
    if the final result is negative or positive respectively. Assume the result is positive if neither is present.
    Read in next the characters until the next non-digit character or the end of the input is reached. The rest of the string is ignored.
    Convert these digits into an integer (i.e. "123" -> 123, "0032" -> 32). If no digits were read, then the integer is 0. Change the sign as necessary (from step 2).
    If the integer is out of the 32-bit signed integer range [-2**31, 2**31 - 1], then clamp the integer so that it remains in the range. Specifically, integers less than -231 should be clamped to -231, and integers greater than 231 - 1 should be clamped to 231 - 1.
    Return the integer as the final result.
    Note:

    Only the space character ' ' is considered a whitespace character.
    Do not ignore any characters other than the leading whitespace or the rest of the string after the digits.
    
    */
    public function myAtoi(string $s): int
    {
        if(strlen($s) == 0) return 0;
        $chars = str_split($s);
        $i = 0;
        while ($chars[$i] == ' ') {
            $i++;
            if (!isset($chars[$i])) return 0;
        }
        $sign = 1;
        if ($chars[$i] == '-') {
            $sign = -1;
            $i++;
        } elseif ($chars[$i] == '+') {
            $i++;
        }

        $number = 0;
        while (isset($chars[$i]) && preg_match('/\d/', $chars[$i])) {
            $number *= 10;
            $number += $sign * intval($chars[$i]);
            $i++;
        }

        $number = max($number, -2 ** 31);
        $number = min($number, 2 ** 31 - 1);
        return $number;
    }
}

$sol = new Solution;

$testCases = [
    ['input' => "42", 'expectedResult' => 42],
    ['input' => "-42", 'expectedResult' => -42],
    ['input' => "   -42", 'expectedResult' => -42],
    ['input' => "4193 with words", 'expectedResult' => 4193],
    ['input' => ' ', 'expectedResult' => 0],
    ['input' => '    ', 'expectedResult' => 0],
    ['input' => '    -', 'expectedResult' => 0],
    ['input' => '    +', 'expectedResult' => 0],
    ['input' => '    +33', 'expectedResult' => 33],
    ['input' => '    -33', 'expectedResult' => -33],
];

foreach ($testCases as $i => $test) {
    $result = $sol->myAtoi($test['input']);
    echo "\nTest $i : '" . $test['input'] . "'\n";
    echo "\tAttendu : '" . $test['expectedResult'] . "'\n";
    echo "\tObtenu  : '" . $result . "'\n";
    echo $result == $test['expectedResult'] ? "Succès" : "Echec";
    echo "\n";
}
