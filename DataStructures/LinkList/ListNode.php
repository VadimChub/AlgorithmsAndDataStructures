<?php

/**
 * 02.02.2019
 * Here is my realization of LinkList
 */

class ListNode
{

    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function getNodeData()
    {
        return $this->data;
    }

}