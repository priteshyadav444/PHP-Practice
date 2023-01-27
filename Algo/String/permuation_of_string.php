<?php
function swap($first, $second, &$str)
{
    $temp = $str[$first];
    $str[$first] = $str[$second];
    $str[$second] = $temp;
}
function permutation($str, $start, $end, &$result)
{

    if ($start == $end) {
        array_push($result, $str);
        return;
    }

    for ($i = $start; $i < $end; $i++) {
        swap($start, $i, $str);
        permutation($str, $start + 1, $end, $result);
        swap($start, $i, $str);
    }
}
function solve($str, $length)
{
    $result = array();
    echo "$str \n";
    permutation($str, 0, $length, $result);
    array_unique($result);
    sort($result);
    return $result;
}
$str = "ABB";
print_r(solve($str, strlen($str)));
