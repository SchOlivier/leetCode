<?php

class ListNode {
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }

    /**
     * Displays all values of a linked list, starting from $root
     */
    public static function displayList(ListNode $root){
        $display = '[' . $root->val;

        while ($root->next){
            $root = $root->next;
            $display .= ', ' . $root->val;
        }

        $display .= ']';
        return $display;
    }

    /**
     * @return ListNode $root
     */
    public static function createLinkedListFromArray($values){
        if(count($values) == 0) return null;
        $val = array_shift($values);
        $node = new ListNode($val);
        $node->next = self::createLinkedListFromArray($values);
        return $node;
    }
}