<?php
class Solution
{
    /**
     * Given an integer x, return true if x is palindrome integer.
     * @param int $x
     * @return bool
     */
    function isPalindrome($x)
    {
        if ($x == 0) return true;
        if ($x < 0 || $x % 10 == 0) return false;

        $nbDigits = floor(log10($x) + 1);

        $nLeft = floor($x / 10 ** ceil($nbDigits / 2));

        $nRight = 0;
        $nbDigitRight = floor($nbDigits / 2);
        for ($i = 1; $i <= $nbDigitRight; $i++) {
            $digit = $x % 10;
            $x = intdiv($x, 10);
            $nRight += $digit * 10 ** ($nbDigitRight - $i);
        }

        return $nLeft == $nRight;
    }
}
// // Variante
// function isPalindrome($x)
// {
//     if ($x == 0) return true;
//     if ($x < 0 || $x % 10 == 0) return false;

//     $digits = [];
//     while ($x != 0) {
//         $digits[] = $x % 10;
//         $x = intdiv($x, 10);
//     }

//     while (sizeof($digits) > 1) {
//         if (array_pop($digits) != array_shift($digits)) return false;
//     }
//     return true;
// }
$sol = new Solution;
$x = 1239321;
echo "$x " . ($sol->isPalindrome($x) ? "est " : "n'est pas ") . "un palindrome \n";
