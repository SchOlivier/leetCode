<?php

class Solution
{
    /*
    You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints of the ith line
    are (i, 0) and (i, height[i]).
    Find two lines that together with the x-axis form a container, such that the container contains the most water.
    Return the maximum amount of water a container can store.
    Notice that you may not slant the container.
    */

    function maxArea($height)
    {
        $i = 0;
        $j = count($height) - 1;
        $maxArea = 0;

        while ($i < $j) {
            $maxArea = max($maxArea, ($j - $i) * min($height[$i], $height[$j]));
            if ($height[$i] < $height[$j]) {
                $i++;
            } else $j--;
        }



        return $maxArea;
    }
}
$sol = new Solution;

$testCases = [
    ['input' => [1, 8, 6, 2, 5, 4, 8, 3, 7], 'expectedResult' => 49],
    ['input' => explode(',', file_get_contents('assets/11-bigTestCase')), 'expectedResult' => 48431514 ],
    ['input' => explode(',', file_get_contents('assets/11-bigTestCase2')), 'expectedResult' => 50000000 ],
];

foreach ($testCases as $i => $test) {
    $result = $sol->maxArea($test['input']);
    echo "\nTest $i : '\n";
    echo "\tAttendu : '" . $test['expectedResult'] . "'\n";
    echo "\tObtenu  : '" . $result . "'\n";
    echo $result == $test['expectedResult'] ? "Succès" : "Echec";
    echo "\n";
}
