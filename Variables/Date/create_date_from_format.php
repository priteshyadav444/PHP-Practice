<?php
$date = "12-09-12";
$format  = "d-m-y";
$newDate = date_create_from_format($format, $date);
print_r($newDate->format($format));
echo "\n";
print_r(DateTime::createFromFormat($format, $date)->format($format));
