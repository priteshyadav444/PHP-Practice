<?php
class DateOperation
{
    public function checkDate($dd, $mm, $yy)
    {
        return checkdate($mm, $dd, $yy);
    }
}
$dateOpeartion = new DateOperation();
var_dump($dateOpeartion->checkDate(12,12,99));