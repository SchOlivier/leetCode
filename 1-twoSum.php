<?php
class Solution
{
    /**
     * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
     * You may assume that each input would have exactly one solution, and you may not use the same element twice.
     * You can return the answer in any order.
     * */

    /**
     * @param int[] $nums
     * @param int $target
     * @return int[]
     */
    function twoSum($nums, $target)
    {
        $map = array_flip($nums);
        foreach ($nums as $i => $n) {
            $complement = $target - $n;
            if (isset($map[$complement]) && $map[$complement] != $i) return [$i, $map[$complement]];
        }
    }
}

$sol = new Solution;
$nums = [2, 7, 7, 15];
$target = 14;

$indices = $sol->twoSum($nums, $target);
echo "Values : [" . implode(", ", $nums) . "] - Target : $target\n";
echo "Indices : [" . implode(", ", $indices) . "]\n";
