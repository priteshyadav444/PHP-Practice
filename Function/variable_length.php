<?php
// function sum(...$numbers): float
// {
//     $result = 0.0;
//     for ($i = 0; $i < count($numbers); $i++) {
//         $result += $numbers[$i];
//     }
//     return $result;
// }
// echo sum(1, 2, 3, 43, 4, 5, 56);
// $numbers = [1, 2, 3, 43, 4, 5, 56];
// echo sum(...$numbers);
// echo sum(...[1, 2, 3, 43, 4, 5, 56]);


$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("red","green", "yellow");
$result = array_diff_assoc($array1, $array2);
print_r($result);
