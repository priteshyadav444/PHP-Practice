<?php
    $square = fn($num) => $num * $num;
    
    function square($input){
        return $input * $input;
    }
    $inputArray = [1,2,3,4,5];
    var_dump($inputArray);
    $finalArray = array_map($square, $inputArray);
    var_dump($finalArray);

    