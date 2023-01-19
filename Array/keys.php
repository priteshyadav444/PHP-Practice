<?php
$arr1 = [[1, 2, 12, 12, 12], [2, 3, 123, 123], [3, 4, 123], [3, 5], [8, 6], [9, 7], [14, 8]];


$result = array();

foreach ($arr1 as $key => $value) {
    $currentKey = $value[0];
    array_shift($value);

    if (isset($result[$currentKey])) {
        $result[$currentKey] = array_merge($result[$currentKey], $value);
    } else {
        $result[$currentKey] =  $value;
    }
}

print_r($result);
