<?php
class Solution
{
    /**
     * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
     * 
     * An input string is valid if:
     * 
     * Open brackets must be closed by the same type of brackets.
     * Open brackets must be closed in the correct order.
     * Every close bracket has a corresponding open bracket of the same type.
     * @param string $s
     * @return bool
     */
    function isValid($s)
    {
        $stack = [];
        $closing = [
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];
        foreach (mb_str_split($s) as $char) {
            if (!array_key_exists($char, $closing)) {
                $stack[] = $char;
                continue;
            }
            $lastbracket = array_pop($stack);
            if ($lastbracket != $closing[$char]) return false;
        }
        return empty($stack);
    }
}

$sol = new Solution;

$testCases = [
    "()" => true,
    "()[]{}" => true,
    "(]" => false,
    "" => true,
    ")" => false
];

$success = true;
foreach ($testCases as $string => $expectedResult) {
    $result = $sol->isValid($string);
    if ($result != $expectedResult){
        echo "Erreur test '$string'. Attendu : " . ($expectedResult ? "true" : "false") . " - Obtenu : " . ($result ? "true" : "false") . ".\n";
        $success = false;
    }
}
if($success) echo "All tests OK ! \n";

