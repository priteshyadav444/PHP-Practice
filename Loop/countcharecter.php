<?php
function countCharecter($input, $char)
{
    $count = 0;
    for ($i = 0; $i < strlen($input); $i++) {
        if ($input[$i] == $char) $count++;
    }
    return $count;
}


echo countCharecter("PriteshPriteshPriteshPriteshPritesh", 'r');
