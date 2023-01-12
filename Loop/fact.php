<?php
function factorial($input)
{
    $result = 1;
    for($i=1; $i<=$input; $i++){
        $result *= $i;
    }
    return $result;
}
echo factorial(5);