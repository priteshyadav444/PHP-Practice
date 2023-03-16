<?php
date_default_timezone_set("Asia/Kolkata");
$file = fopen("log.txt", "a+");
$data = "Last Update — ->  " . date('Y-m-d H:i:s') . PHP_EOL;
fwrite($file, $data);
fclose($file);
