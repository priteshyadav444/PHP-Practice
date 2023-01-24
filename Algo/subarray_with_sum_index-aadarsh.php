<?php
$arr = [12, 3, 7, 1, 4, 6, 9, 2, 45, 6, 12];
$size = count($arr);
$s = 11;
$sum = 0;
$j = 0;
function checkAdd(&$arr, &$j, &$size, &$s, &$sum)
{
    if ($j < $size) {
        for ($i = $j; $i < $size; $i++) {
            $sum += $arr[$i];

            if ($sum == $s) {
                echo "\n" . $j . ' ' . $i;
                exit();
            }
        }
        $j++;
        $sum = 0;
        checkAdd($arr, $j, $size, $s, $sum);
    } else {
        echo 'no';
    }
}
checkAdd($arr, $j, $size, $s, $sum);
