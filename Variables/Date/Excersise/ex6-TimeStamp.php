<?php
// Sample date : 12-05-2014
// Expected Result : 1399852800

$data = "12-05-2014";
print_r(strtotime($data));
echo "\n";

$dateTime = new DateTime($data);
echo $dateTime->format('U');
echo "\n";

list($day, $month, $year) = explode('-', $data);
echo mktime(0, 0, 0, $month, $day, $year);
