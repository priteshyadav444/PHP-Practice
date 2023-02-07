<?php
$date1 = date_create("2013-01-01");
$date2 = date_create("2013-02-10");
$diff = date_diff($date1, $date2);

$date1 = new DateTime('tomorrow');
$date2 = new DateTime('yesterday');
$diff = date_diff($date1, $date2);

// %a outputs the total number of days
echo $diff->format("Total number of days: %a.");
