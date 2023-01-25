<?php
function solve($inputArray, $length)
{
    $currenSum = 0;
    $ans = PHP_INT_MIN;
    for ($i = 0; $i < $length; $i++) {
        $currenSum += $inputArray[$i];

        if ($currenSum > $ans)
            $ans = $currenSum;
        if ($currenSum < 0)
            $currenSum = 0;
    }
    return $ans;
}

$arr = [9, 1, -12, 3, 5, 2, 1, 3, 2];
print_r(solve($arr, count($arr)));
