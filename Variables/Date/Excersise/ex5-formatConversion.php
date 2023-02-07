<?php
// Sample date : 2012-09-12
// Expected Result : 12-09-2012

$data = "2012-09-12";
$newDate = date_create_from_format('Y-m-d', $data);
print_r($newDate->format("d-m-y"));
