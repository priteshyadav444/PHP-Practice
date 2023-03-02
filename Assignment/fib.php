<?php
function printFibo($type, $noOfElement)
{

    $fib = array();

    // Add the starting points to the Fibonacci series
    $fib[0] = 0;
    $fib[1] = $type >= 0 ? 1 : -1;

    // Calculate the remaining elements in the series
    if ($type >= 0) {
        for ($i = 2; $i < $noOfElement; $i++) {
            array_push($fib, $fib[count($fib) - 2] + $fib[count($fib) - 1]);
        }
    } else {
        for ($i = 2; $i < $noOfElement; $i++) {
            array_unshift($fib, $fib[1] - $fib[0]);
        }
        $fib = array_reverse($fib);
    }


    // Print the Fibonacci series
    foreach ($fib as $num) {
        echo $num . " ";
    }
}


// printFibo(-1, 12);
$data["name"] = " ";
var_dump(isset($data['name']));
