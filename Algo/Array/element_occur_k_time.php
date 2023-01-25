<?php
function solve($arr, $length, $k)
{
    $map = array();
    for ($i = 0; $i < $length; $i++) {
        $currentElement = $arr[$i];
        if (isset($map[$currentElement])) {
            $map[$currentElement] += 1;
        } else {
            $map[$currentElement] = 1;
        }

        if ($map[$currentElement] == $k) {
            return $currentElement;
        }
    }
}

$arr = [1, 7, 4, 3, 4, 8, 7];
print_r(solve($arr, count($arr), 2));
