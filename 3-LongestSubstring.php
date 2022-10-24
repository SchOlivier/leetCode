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
    function lengthOfLongestSubstring($s)
    {
        if (strlen($s) < 2) return strlen($s);
        $indices = [];

        $length = 0;
        $start = 0; // Start of the (current) longest substring

        //parse letters one by one
        foreach (mb_str_split($s) as $i => $char) {
            if (isset($indices[$char]) && $indices[$char] >= $start) {
                // If letter already seen and is after the current substring
                // move the starting point to the right of the previously seen character
                $start = $indices[$char] + 1;
            } else {
                // Update the length (if longer)
                $length = max($length, $i - $start + 1);
            }
            $indices[$char] = $i;
        }
        return $length;
    }
}

$testCases = ['abcabcbb', "bbbbb", "pwwkew", " ", "au", "aab", "tmmzuxt"];

$solution = new Solution;

foreach ($testCases as $test) {
    echo "\n'" . $test . "' : length of " . $solution->lengthOfLongestSubstring($test) . "\n";
}
