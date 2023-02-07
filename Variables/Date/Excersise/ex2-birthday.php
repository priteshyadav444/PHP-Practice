<?php
// $birthdate = "16/08/2001";
$birthdate = "14/01/2023";
$todayDate = new DateTime();

$birthdate = date_create_from_format("d/m/Y", $birthdate);
$futureAge = date_diff($birthdate, $todayDate)->y + 1;

date_add($birthdate, date_interval_create_from_date_string("$futureAge year"));
$days = date_diff($birthdate, $todayDate)->days;

echo "Your {$futureAge}th Birthday after {$days} days ;)";
