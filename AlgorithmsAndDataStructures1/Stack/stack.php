<?php
    class Stack {
	public $a;
	public $s;
	public $top;
	public $n;

	public function __construct($a) {
	    $this->a = $a;
	    $this->s = array();
	    $this->top = 0;
	    $this->n = count($a);	
	}
	public function initialize() {
	    $this->top = 0;
	}
	public function isFull($top) {
	    return $top >= $this->n - 1;
	}

	public function isEmpty($top) {
	    return $top == 0;
	}

	 public function push($v) {
	    if (self::isFull($this->top)) {echo "FULL!"; return false;}
	    $this->top++;
	    $this->s[$this->top] = $v;
	}

	 public function pop() {
	    if (self::isEmpty($this->top)) {echo "EMPTY!"; return false;}
	    $this->top--;
	    return $this->s[$this->top + 1]; 
	}
    }

    $a = explode(" ", trim(fgets(STDIN))); 
    $stk = new Stack($a);
    $stk_a = $stk->a;

    for ($i = 0; $i < $stk->n; $i++) {
	$ele = $stk_a[$i];
	if (!ctype_digit($ele)) {
	    $a = $stk->pop();
	    $b = $stk->pop();
	    if ($ele == '+') {
		$stk->push($b + $a);
	    } else if ($ele == '-') {
		$stk->push($b - $a);
	    } else if ($ele == '*') {
		$stk->push($b * $a);
	    }
	} else {
	    $stk->push($ele);
	}
    }

    $result = $stk->s[1];
    echo $result;
?>
