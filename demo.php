<?php

require('Scheduler.class.php');
require('Task.class.php');
require('function.php');

$urls = array(
	'http://localhost/CoProcess/api.php?id=1',
	'http://localhost/CoProcess/api.php?id=2',
	'http://localhost/CoProcess/api.php?id=3',
	'http://localhost/CoProcess/api.php?id=4',
	'http://localhost/CoProcess/api.php?id=5',
	'http://localhost/CoProcess/api.php?id=6',
	'http://localhost/CoProcess/api.php?id=7',
	'http://localhost/CoProcess/api.php?id=8',
	'http://localhost/CoProcess/api.php?id=9',
	'http://localhost/CoProcess/api.php?id=10',
	'http://localhost/CoProcess/api.php?id=11',
);

// 在这里串行执行任务 - 需要时间20秒
// foreach ($urls as $key => $value) {
//     echo file_get_contents($value).PHP_EOL;
// }


function task($url){
    echo 'get '.$url.PHP_EOL;
    yield;
    $res = curlGet($url);
    echo $res.PHP_EOL;
}

// 实例化一个调度器 - 花费时间2秒
$scheduler = new Scheduler;
foreach ($urls as $key => $url) {
    $scheduler->addTask(task($url));
}
$scheduler->run();

