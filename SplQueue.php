<?php

// PHP的队列这个对象，就是一个很简单的可迭代的对象，是一个链表


// 两种方式实现队列
$queue = new SplQueue;
//入队
for ($i=0; $i < 100; $i++) { 
    $queue->push($i);
}

foreach ($queue as $key => $value) {
    $data = $queue->shift();
    var_dump($data);
    var_dump($value);
}
//出队

//查询队列中的排队数量
$n = count($queue);

// 数组方式实现队列
$queue = array();
//入队
$data = 1;
$queue[] = $data;
//出队
$data = array_shift($queue);
//查询队列中的排队数量
$n = count($queue);