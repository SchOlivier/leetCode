<?php
require 'ListNode.php';

class Solution
{
    /**
     * You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, 
     * and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.
     * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2, $carryOver = 0)
    {
        if (!$l1 && !$l2 && !$carryOver) return null;

        $val1 = $l1 ? $l1->val : 0;
        $val2 = $l2 ? $l2->val : 0;

        $next1 = $l1 ? $l1->next : null;
        $next2 = $l2 ? $l2->next : null;

        $val = $val1 + $val2 + $carryOver;
        $carryOver = $val > 9;

        $node = new ListNode($val % 10);
        $node->next = $this->addTwoNumbers($next1, $next2, $carryOver);

        return $node;
    }
}

$testCases = [
    [ListNode::createLinkedListFromArray([2,4,3]), ListNode::createLinkedListFromArray([5,6,4])],
    [ListNode::createLinkedListFromArray([0]), ListNode::createLinkedListFromArray([5,6,4])],
    [ListNode::createLinkedListFromArray([0]), ListNode::createLinkedListFromArray([0])],
    [ListNode::createLinkedListFromArray([9,9,9,9,9,9,9]), ListNode::createLinkedListFromArray([9,9,9,9])],
];

$solution = new Solution;

foreach($testCases as $test){
    echo "\n" . ListNode::displayList($test[0]) . " + " . ListNode::displayList($test[1]) . "\n";
    echo "= " . ListNode::displayList($solution->addTwoNumbers($test[0], $test[1])) . "\n";
}