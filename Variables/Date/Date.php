<?php

class DateOperation
{
    public function checkDate($dd, $mm, $yy)
    {
        return checkdate($mm, $dd, $yy);
    }
    public function getData()
    {
        return new DateTime();
    }
    public function getTimeStamp()
    {
        $date = new DateTime();
        return $date->getTimestamp();
    }
    public function getCurrentTimeStamp()
    {
        return time();
    }
}
$dateOpeartion = new DateOperation();
// var_dump($dateOpeartion->checkDate(12, 12, 99));
// var_dump($dateOpeartion->getTimeStamp());
$date = new DateTime();
// echo $date->format("j-M-y h:mm:s , H:i: (D)");

$timestamp = $date->format('U');
// echo $timestamp;
// echo $dateOpeartion->getCurrentTimeStamp();

// echo date('D-m-Y', strtotime('today'));

$ss = new DateTime();
// $dateInteval = new DateInterval("");
echo date('Y', strtotime('ss'));
echo "\n";
print_r(time());
// $date = date_create("2013-03-15");
// echo date_format($date, "Y/m/d");






