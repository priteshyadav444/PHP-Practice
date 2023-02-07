<?php
// Sample dates : 1981-11-04, 2013-09-04
// Expected Result : 31 years, 10 months, 11 days
$date1 = "1981-04-01";
$date2 = "2013-09-04";


$years = 0;
$months = 0;
$days = "";

$ndate1 = date_create_from_format("Y-m-d", $date1);
$ndate2 = date_create_from_format("Y-m-d", $date2);

while ($ndate1 < $ndate2) {

    if (date_diff($ndate1, $ndate2)->y != 0) {
        $years++;
    } else {
        $months = date_diff($ndate1, $ndate2)->m;
        $ndate1 = date_add($ndate1, date_interval_create_from_date_string("$months month"));

        var_dump($ndate1);
        var_dump($ndate2);

        $days = round(date_diff($ndate1, $ndate2)->days);
    }
    $ndate1 = date_add($ndate1, date_interval_create_from_date_string("1 year"));
}

// $diff = abs(strtotime($date1) - strtotime($date2));
// $years = floor($diff / (365 * 60 * 60 * 24));
// $months = floor(($diff  - ($years * 365 * 60 * 60 * 24)) /  (60 * 60 * 30 * 24));
// $days = floor(($diff  - $years * 365 * 60 * 60 * 24 - $months * 60 * 60 * 30 * 24) /  (60 * 60 * 24));

echo "$years years, $months months, $days days";

// $date1 = date_create_from_format("Y-m-d", $date1);
// $date2 = date_create_from_format("Y-m-d", $date2);
// $diff = date_diff($date2, $date1);

// // print_r($diff);
// $days = ($diff->days / 365);
// echo "{$diff->y} years, {$diff->m} months, $days days";
