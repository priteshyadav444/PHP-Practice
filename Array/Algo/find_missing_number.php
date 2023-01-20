<?php
function findMissing($inputArray, $length)
{
    $result = 0;
    for ($i = 1; $i <= $length; $i++) {
        $result += $inputArray[$i - 1];
        $result -= $i;
    }
    return abs($result -= ($length + 1));
}
$testArray = [6, 1, 2, 8, 3, 4, 7, 10, 5];
print_r(findMissing($testArray, count($testArray)));
