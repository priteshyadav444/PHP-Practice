<?php
function sum(...$numbers): float
{
    $result = 0.0;
    for ($i = 0; $i < count($numbers); $i++) {
        $result += $numbers[$i];
    }
    return $result;
}
echo sum(1, 2, 3, 43, 4, 5, 56);
$numbers = [1, 2, 3, 43, 4, 5, 56];
echo sum(...$numbers);
echo sum(...[1, 2, 3, 43, 4, 5, 56]);
