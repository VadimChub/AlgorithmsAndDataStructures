<?php

/**
 * Created by vadimchub
 * Date: 2/2/19
 * Time: 3:57 PM
 */

require_once (__DIR__.'/ListNode.php');

class LinkList
{
    protected $firstNode;
    protected $lastNode;
    protected $count;


    function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = null;
    }

    public function isEmpty()
    {
        return ($this->firstNode == null);
    }

    public function insertFirstNode($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = $link;

        if($this->lastNode == null){
            $this->lastNode = $this->firstNode;
        }

        $this->count++;
    }

    public function insertLastNode($data)
    {
        if($this->firstNode != null){
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $this->lastNode = $link;
            $this->count++;
        } else {
            $this->insertFirstNode($data);
        }
    }

    public function deleteFirstNode()
    {
        if($this->firstNode != null) {
            if ($this->firstNode != $this->lastNode) {
                $this->firstNode = $this->firstNode->next;
            } else {
                $this->firstNode->next = null;
                $this->firstNode = null;
            }
            $this->count--;
        }
    }

    public function deleteLastNode()
    {
        if($this->firstNode != null){
            $currentNode = $this->firstNode;
            $previousNode = null;
            while($currentNode->next != null){
                $previousNode = $currentNode;
                $currentNode = $currentNode->next;
            }
            $previousNode->next = null;
            $this->count--;
        }
    }

    public function deleteNodeByKey($key)
    {
        if($this->firstNode != null) {
            $current = $this->firstNode;
            $previous = null;
            while ($current->data != $key) {
                if($current->next == null){
                    return null;
                }
                $previous = $current;
                $current = $current->next;
            }
            if($current == $this->firstNode){
                $this->deleteFirstNode();
            } else {
                if($current->next == null){
                    $this->deleteLastNode();
                } else {
                    $previous->next = $current->next;
                    $this->count--;
                }
            }
        }
    }

    public function findNodeByKey($key)
    {
       $current = $this->firstNode;
       while($current != $key){
           if($current->next == null){
               return null;
           } else {
               $current = $current->next;
           }
       }
       return $current;
    }

    public function findNodeByPosition($position)
    {
        if ($this->totalNodes() >= $position){
            $current = $this->firstNode;
            $counter = 1;
            while ($counter != $position){
                if($current->next == null){
                    return null;
                }
                $current = $current->next;
                $counter++;
            }
            return $current->getNodeData();
        }
        return null;
    }

    public function totalNodes()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = [];
        $current = $this->firstNode;
        while($current != null){
            $listData[] = $current;
            $current = $current->next;
        }
        return $listData;
    }

    public function reverseList()
    {
        if($this->firstNode != null && $this->firstNode->next != null){
            $current = $this->firstNode;
            $new = null;
            while ($current != null){
                $temporary = $current->next;
                $current->next = $new;
                $new = $current;
                $current = $temporary;
            }
            $this->firstNode = $new;
        }
    }

}