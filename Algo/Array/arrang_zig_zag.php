<?php
function swap(&$first, &$second)
{
    $temp = $first;
    $first = $second;
    $second = $temp;
}

function sortZigZag(&$arr, $length)
{
    $greater = true;
    for ($i = 1; $i < $length - 1; $i++) {
        if ($greater) {
            if (!($arr[$i] > $arr[$i - 1] && $arr[$i] > $arr[$i + 1]))
                swap($arr[$i], $arr[$i + 1]);
        } else {
            if (!($arr[$i] < $arr[$i - 1] && $arr[$i] < $arr[$i + 1]))
                swap($arr[$i], $arr[$i + 1]);
        }
        $greater = !$greater;
    }
    print_r($arr);
}

$data  = [1, 2, 3, 0];
sortZigZag($data, count($data));
