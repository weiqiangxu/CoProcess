<?php
sleep(2);
echo json_encode(array('status'=>true,'time'=>$_GET['id']));