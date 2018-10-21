<?php
function xrange($start, $end, $step = 1) {
    for ($i = $start; $i <= $end; $i += $step) {
    	echo $i.PHP_EOL;
        yield $i;
    }
}
 
foreach (xrange(1, 10000) as $num) {
    echo 'aaaa '.$num.PHP_EOL;
    if($num==3)
    die;
}