<?php
class Solution
{

    /**
     * Given two sorted arrays nums1 and nums2 of size m and n respectively, return the median of the two sorted arrays.
     * The overall run time complexity should be O(log (m+n)).
     * 
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        // naive solution. No idea how to do this in O(log (m+n))
        $array = $this->mergeArrays($nums1, $nums2);
        return $this->getMedian($array);
    }

    function mergeArrays($a1, $a2)
    {
        $a = array_merge($a1, $a2);
        sort($a);
        return $a;
    }

    function getMedian($array)
    {
        $middle = count($array) / 2;
        $median = ($array[floor($middle)] + $array[ceil($middle -1)])/2;
        return $median;
    }
}

$solution = new Solution();

$testCases = [
    [[1, 3], [2]],
    [[1, 2], [3, 4]]
];

foreach ($testCases as $test) {
    echo "\n[" . implode(", ", $test[0]) . "], [" . implode(", ", $test[1]) . "] :\n";
    echo "Median : " . $solution->findMedianSortedArrays($test[0], $test[1]) . "\n";
}
