<?php
function solve($arr1, $arr2, $length)
{
    $ans = 0;
    sort($arr1);
    rsort($arr2);
    for ($i = 0; $i < $length; $i++) {
        $ans += ($arr1[$i] * $arr2[$i]);
    }
    return $ans;
}


$arr1  = [3, 1, 1];
$arr2 = [6, 5, 4];

print_r(solve($arr1, $arr2, count($arr1)));
