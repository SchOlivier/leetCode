<?php
class Solution
{

    /**
     * Given a signed 32-bit integer x, return x with its digits reversed. If reversing x causes the value to go 
     * outside the signed 32-bit integer range [-231, 231 - 1], then return 0.
     * Assume the environment does not allow you to store 64-bit integers (signed or unsigned).
     * @param string $s
     * @param int $numRows
     * @return string
     */
    public function reverse(int $x): int
    {
        if ($x == 0) return $x;
        $sign = $x / abs($x);
        $max = $sign == 1 ? [2, 1, 4, 7, 4, 8, 3, 6, 4, 7] : [2, 1, 4, 7, 4, 8, 3, 6, 4, 8];
        $digits = $this->getDigits(abs($x));

        if (count($digits) < count($max)) {
            return ((int)implode($digits)) * $sign;
        } else {
            foreach ($digits as $i => $d) {
                if ($d > $max[$i]) return 0;
                if ($d < $max[$i]) break;
            }
            return ((int)implode($digits)) * $sign;
        }
    }

    private function getDigits(int $x): array
    {
        $digits = [];
        while ($x > 9) {
            $digits[] = $x % 10;
            $x = intval($x / 10);
        }
        $digits[] = $x;
        return $digits;
    }
}

$sol = new Solution;

$testCases = [
    ['input' => 123, 'expectedResult' => 321],
    ['input' => -123, 'expectedResult' => -321],
    ['input' => 120, 'expectedResult' => 21],
    ['input' => 2147483648, 'expectedResult' => 0],
    ['input' => -2147483412, 'expectedResult' => -2143847412],
];

foreach ($testCases as $i => $test) {
    $result = $sol->reverse($test['input']);
    echo "\nTest $i : '" . $test['input'] . "'\n";
    echo "\tAttendu : '" . $test['expectedResult'] . "'\n";
    echo "\tObtenu  : '" . $result . "'\n";
    echo $result == $test['expectedResult'] ? "Succès" : "Echec";
    echo "\n";
}
