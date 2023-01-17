<?php
function return_numbers()
{
    return [0, 1, 2];
}
[$zero, $one, $two] = return_numbers();
echo $zero, $two, $one . "<br>";

list($zero, $one, $dir) = return_numbers();

echo $zero, $two, $one . "<br>";
