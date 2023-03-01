<?php
function printFibo($start, $noofelement)
{

    $first = 0;
    $second = 1;

    $result = array();
    $count = count($result);


    while ($count < $noofelement) {
        if ($start >= 0)
            $nextFibo = $first + $second;
        else
            $nextFibo = $second - $first;

        if (($start < 0 && $nextFibo == 1) || $start < 0) {
            array_unshift($result, $nextFibo);
            echo "if $nextFibo unshift $count \n";
            $second = $first;
            $first = $nextFibo;
            $start = $nextFibo;
        } else {
            echo "else $nextFibo unshift $count \n";
            array_push($result, $nextFibo);
            $first = $second;
            $second = $nextFibo;
        }
        $count = count($result);
    }
    print_r($result);
}


printFibo(-1, 12);
