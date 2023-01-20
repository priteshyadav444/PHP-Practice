<?php
function swap(&$first, &$second)
{
    $temp = $first;
    $first = $second;
    $second = $temp;
}
function array_rev_group(&$inputArray, $length, $group)
{
    if ($length < $group || $group == 1) {
        return false;
    }

    $countGroup = 1;
    $offset = $countGroup * $group - 1;

    for ($i = 0; $i < $length; $i++) {
        if ($offset >= $length) {
            $i = $offset + 1 - $group;
            $offset = $length - 1;
            while ($i < $offset) {
                swap($inputArray[$i], $inputArray[$offset]);
                $offset--;
                $i++;
            }
            break;
        } else if ($i < $offset) {
            swap($inputArray[$i], $inputArray[$offset]);
            $offset--;
        } else {
            $countGroup++;
            $i = $offset + 1;
            $offset = $countGroup * $group - 1;
        }
    }
}

$array = [5, 6, 8, 9, 3, 1, 4];
array_rev_group($array, count($array), count($array));
print_r($array);
