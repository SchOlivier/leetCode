<?php

class Solution
{
    /**
     * Given a string s, find the length of the longest substring without repeating characters.
     * 0 <= s.length <= 5 * 104
     * s consists of English letters, digits, symbols and spaces.
     * @param string $s
     * @return int
     */
    function longestPalindrome($s)
    {
        if (strlen($s) <= 1) return $s;
        $palindrome = '';
        for ($i = 0; $i < strlen($s); $i++) {
            $oddPalindrome = $this->findBiggestPalindromeAroundSubstring($i, $i, $s);
            $palindrome = strlen($oddPalindrome) > strlen($palindrome) ? $oddPalindrome : $palindrome;

            $evenPalindrome = $this->findBiggestPalindromeAroundSubstring($i, $i + 1, $s);
            $palindrome = strlen($evenPalindrome) > strlen($palindrome) ? $evenPalindrome : $palindrome;
        }
        return $palindrome;
    }

    function findBiggestPalindromeAroundSubstring($start, $end, $s)
    {
        if (!isset($s[$end]) || $s[$start] != $s[$end]) return '';
        while ($start > 0 && $end < (strlen($s) - 1) && $s[$start - 1] == $s[$end + 1]) {
            $start--;
            $end++;
        }
        return substr($s, $start, $end - $start + 1);
    }
}

$testCases = ['abcabcbbcb', "bbbbb", "ccb", "abadd", "pwwkeew", "999", "bagabfbabbad", "cbbdb", "tmmzuxt", "q"];
// $testCases = ["abcabcbbcb"];

$solution = new Solution;

foreach ($testCases as $test) {
    echo "\n'" . $test . "' : \n";
    echo "palindrome : " . $solution->longestPalindrome($test) . "\n";
}
