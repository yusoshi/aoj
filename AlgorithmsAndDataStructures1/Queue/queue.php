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
    public function getMax() {
	return $this->max;
    }
    public function getCount() {
	return $this->count;
    }
    public function setQ($q) {
	return $this->q = $q;
    }
    public function setHead($head) {
	return $this->head = $head;
    }

    public function setTail($tail) {
	return $this->tail = $tail;
    }
    public function setMax($max) {
	return $this->max = $max;
    }
    public function setCount($count) {
	return $this->count = $count;
    }
    public function setNewProcess($sec) {
	$this->q[$this->head]['sec'] = $sec;
    }
}

fscanf(STDIN, "%d %d", $n, $quantum);
$processes = new Queue($n);
for ($i = 0; $i < $n; $i++) {
    fscanf(STDIN, "%s %d", $name, $sec);
    $processes->enqueue(array('name' => $name, 'sec' => $sec));
}
$requiredSec = 0;

while ($processes->getCount() != 0) {
    $sec = $processes->getQ()[$processes->getHead()]['sec'];
    $remainingSec = $sec - $quantum;
    if ($remainingSec <= 0) {
	$requiredSec += $sec;
	$x = $processes->dequeue();
	echo $x['name'] . " " . $requiredSec;
	if (!$processes->isEmpty()) {
	    echo "\n";
	} 

    } else {
	$requiredSec += $quantum;
        $processes->setNewProcess($processes->getQ()[$processes->getHead()]['sec'] - $quantum);
	$x = $processes->dequeue();
	$processes->enqueue($x);
    }
}
?>
