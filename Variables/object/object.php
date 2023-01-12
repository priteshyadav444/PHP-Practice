<?php
include './ObjectFormatter.php';
use ObjectOperation\ObjectFormatter as OB;

$statuscode = "SUCCESS";
$code = 200;
$data = array(array('name' => 'Pritesh', 'age' => 18),  array('name' => 'Pritesh', 'age' => 18));

$objectOperation = new OB();
$result = $objectOperation->format($data, $code,$statuscode);

header("Content-Type: application/json");

echo ($result);
exit();
