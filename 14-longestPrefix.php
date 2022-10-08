<?php
class Solution
{
    /**
     * Write a function to find the longest common prefix string amongst an array of strings.
     * If there is no common prefix, return an empty string "".
     * @param string[] $strs
     * @return string
     */
    function longestCommonPrefix($strs)
    {
        if (sizeof($strs) == 1) return $strs[0];
        sort($strs);
        $first = array_shift($strs);
        $last = array_pop($strs);
        $common = '';
        for ($i = 0; $i < min(strlen($first), strlen($last)); $i++) {
            if ($first[$i] != $last[$i]) return $common;
            $common .= $first[$i];
        }
        return $common;
    }
}
$sol = new Solution;
$strs = ["1"];
echo $sol->longestCommonPrefix($strs) . "\n";
