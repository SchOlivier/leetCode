<?php
class Solution
{
    /**
     * Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.
     * You must write an algorithm with O(log n) runtime complexity.
     * @param int[] $nums
     * @param int $target
     * @return int
     */
    //Second try, without recursion
    function searchInsert($nums, $target)
    {
        $start = 0;
        $end = count($nums) - 1;

        while ($start <= $end) {
            $mid = floor(($start + $end) / 2);
            if ($nums[$mid] == $target) return $mid;
            if ($nums[$mid] > $target) {
                $end = $mid - 1;
            } else {
                $start = $mid + 1;
            }
        }
        return $start;
    }


    //  //First try, recursive
    // function searchInsert($nums, $target, $offset = 0)
    // {
    //     if (sizeof($nums) == 1) {
    //         return $nums[$offset] < $target ? $offset + 1 : $offset;
    //     }
    //     $halfSize = floor(sizeof($nums) / 2);
    //     $indexMid = $halfSize + $offset;
    //     if ($target > $nums[$indexMid]) {
    //         return searchInsert(array_slice($nums, $halfSize, null, true), $target, $indexMid);
    //     }
    //     return searchInsert(array_slice($nums, 0, $halfSize, true), $target, $offset);
    // }
}

$sol = new Solution;
$nums = [1, 3, 5, 6, 8];
$target = 5;

echo $sol->searchInsert($nums, $target) . "\n";
