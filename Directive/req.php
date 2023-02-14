<?php
function print_num()
{
    static $num = 1;
    $num++;
    echo "Num $num <br>";
}
print_num();
