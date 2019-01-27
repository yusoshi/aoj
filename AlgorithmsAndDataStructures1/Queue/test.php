<?php
require_once("./queue.php");
$case = "Case: ";
$result = "Result: ";
$line = "---------------------------------\n";

# case1:エンキューできるか
echo $case . "Anable to enqueue\n";
echo $result;

$t1 = new Queue(3);
$t1->enqueue(3);
$t1->enqueue(4);
$t1->enqueue(5);
if ($t1->getQ() === array(3, 4, 5)) {
    echo "True\n";
} else {
    echo "False\n";
}
echo $line;

# case2:デキューできるか
echo $case . "Anable to dequeue\n";
echo $result;
$t2 = new Queue(2);
$t2->enqueue(3);
$x = $t2->dequeue();
if ( $x === 3 ) {
    echo "True\n";
} else {
    echo "False\n";
}
echo $line;

# case3: キューの最大数を超えたとき、エラーが出る
echo $case . "Enqueue an item more than max-length.\n";
echo $result;
$t3 = new Queue(2);
$t3->enqueue(3);
$t3->enqueue(3);
if (!$t3->enqueue(5)) {
    echo "True\n";
} else {
    echo "False\n";   
};
echo $line;

# case4: キューが空のとき、デキューしようとするとエラーが出る
echo $case . "Dequeue an item from more an empty queue\n";
echo $result;
$t4 = new Queue(2);
$t4->enqueue(3);
$t4->enqueue(3);
$t4->dequeue();
$t4->dequeue();
if (!$t4->dequeue()) {
    echo "True\n";
} else {
    echo "False\n";   
};

echo $line;
