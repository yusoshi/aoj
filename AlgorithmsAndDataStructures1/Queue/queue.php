<?php
class Queue {
    private $q; 
    private $head; 
    private $tail; 
    private $max;

    public function __construct($max) {
	$this->q = array();
	$this->head = 0;
	$this->tail = 0;
	$this->max = $max;
	$this->count = 0;
    }

    public function isFull() {
	return $this->count >= $this->max;
    }

    public function isEmpty() {
	return $this->count == 0;
    }

    public function enqueue($v) {
	if ($this->isFull()) {echo "The queue is full.\n"; return false;}
	$this->q[$this->tail] = $v;

	if ($this->tail + 1 == $this->max) {
	    $this->tail = 0;
	} else {
	    $this->tail++;
	}
	$this->count++;
    }

    public function dequeue() {
	if ($this->isEmpty()) {echo "The queue is empty.\n"; return false;}
	$x = $this->q[$this->head];

	if ($this->head + 1 == $this->max) {
	    $this->head = 0;
	} else {
	    $this->head++;
	}
	$this->count--;
	
	return $x;
    }

    public function getQ() {
	return $this->q;
    }

    public function getHead() {
	return $this->head;
    }

    public function getTail() {
	return $this->tail;
    }
}


?>
