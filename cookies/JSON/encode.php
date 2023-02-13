<?php
// $array = [
//     'name' => 'Jeff',
//     'age' => 20,
//     'active' => true,
//     'colors' => ['red', 'blue'],
//     'values' => [0 => 'foo', 1 => 'bar'],
// ];
// echo json_encode($array);


$array = ['Joel', 23, true, ['red', 3=>'blue']];
echo json_encode($array).PHP_EOL;
echo json_encode($array, JSON_FORCE_OBJECT);


