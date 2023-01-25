<?php
function solve($firstString, $secondString)
{
    $newString = substr($firstString, 2, strlen($firstString) - 2) . substr($firstString, 0, 2);
    if ($newString == $secondString) return true;

    $newString = substr($firstString, strlen($firstString) - 2, 2) . substr($firstString, 0, strlen($firstString) - 2);
    if ($newString == $secondString) return true;

    return false;
}
$a = 'fsbcnuvqhffbsaqxwp';
$b = 'wpfsbcnuvqhffbsaqx';

var_dump(solve($a, $b));
