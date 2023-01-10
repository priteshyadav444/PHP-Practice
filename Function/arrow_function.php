<?php

$y = 1;
 
$fn1 = fn($x) => $x + $y;
// equivalent to using $y by value:
$fn2 = function ($x) use ($y) {
    return $x + $y;
};
// var_export($fn1(3));



// $z = 1;
// $fn = fn($x) => fn($y) => $x * $y + $z;
// // Outputs 51
// var_export($fn(5)(10));

// Pass By refrencesx
$num = 3;
$incrementFunction = fn&(&$input) => $input;
echo $num."\n";
$refnum = &$incrementFunction($num); // return refrences

echo $refnum."\n";
$refnum++;
echo $num."\n";

?>