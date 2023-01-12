<?php
function combination($digit)
{
    $end = (10 ** $digit) - 1;
    $start = $digit == 1 ? 1 : (10 ** ($digit - 1));

    for ($i = $start; $i <= $end; $i++) {
        echo "$i,";
    }
}
combination(3);