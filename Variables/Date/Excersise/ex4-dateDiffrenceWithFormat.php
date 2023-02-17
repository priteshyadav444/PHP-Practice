<?php
// Sample dates : 1981-11-04, 2013-09-04
// Expected Result : 31 years, 10 months, 11 days
$date1 = "2024-02-30";
$date2 = "2024-03-01";

$years = 0;
$months = 0;
$days = 0;

$ndate1 = date_create_from_format("Y-m-d", $date1);
$ndate2 = date_create_from_format("Y-m-d", $date2);

while ($ndate1 < $ndate2) {

    if (date_diff($ndate1, $ndate2)->y != 0) {
        $years++;
    } else {
        $months = date_diff($ndate1, $ndate2)->m;
        $ndate1 = date_add($ndate1, date_interval_create_from_date_string("$months month"));

        $days = round(date_diff($ndate1, $ndate2)->days);
    }
    $ndate1 = date_add($ndate1, date_interval_create_from_date_string("1 year"));
}

echo "$years years, $months months, $days days";
