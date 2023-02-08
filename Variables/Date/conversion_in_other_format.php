<?php
// First Way using time which is in string
$timestamp = strtotime('12-12-12');
print_r(date('Y-m-d H:i:s', $timestamp));

// First Way using time which is in DateTime

$date = new DateTime();
echo "\n";
print_r($date->format('Y-M-d'));
