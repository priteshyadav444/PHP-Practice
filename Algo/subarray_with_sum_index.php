<?php
function solve($inputArray, $length, $sum)
{
    $start = 0;
    $end = 0;

    $currentsum = $inputArray[$start];
    while ($start < $length && $end < $length) {
        if ($currentsum == $sum) {
            echo "Start: $start End : $end \n";
            break;
        }
        if ($currentsum > $sum) {
            $currentsum = 0;
            $currentsum += $inputArray[++$start];
            $end = $start;
        } else {
            if ($end < $length - 1) {
                $currentsum += $inputArray[++$end];
            } else if ($currentsum < $sum) {
                break;
            }
        }
        echo "Current Sum: $currentsum (Start : $start And End : $end)\n";
    }
}


