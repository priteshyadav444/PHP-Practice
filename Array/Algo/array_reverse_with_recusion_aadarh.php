<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8];
$group_length = 2;
$newgroup = $group_length;
$pos = 0;
$size = count($arr);
$diff = $size;

function reverseGroupArr(&$arr, &$group_length, &$newgroup, &$pos, &$diff, &$size)
{
    if ($diff > 1) {
        for ($i = $pos, $j = ($newgroup - 1); $i < $newgroup, $j > $i; $i++, $j--) {
            $first_ele = $arr[$i];
            $last_ele = $arr[$j];
            $arr[$i] = $last_ele;
            $arr[$j] = $first_ele;
        }
        $pos = $newgroup;

        $newgroup += $group_length;
        if ($newgroup > $size) {
            $newgroup += $size % $group_length - $group_length;
        }
        $diff = $size - $pos;

        reverseGroupArr($arr, $group_length, $newgroup, $pos, $diff, $size);
    } else {
        return false;
    }
}
reverseGroupArr($arr, $group_length, $newgroup, $pos, $diff, $size);
print_r($arr);
