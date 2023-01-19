<?php
// * 
// * * 
// * * * 
// * * * * 
// * * * * * 
// * * * * * 
// * * * * 
// * * * 
// * * 
// * 
function pattern($height)
{
    if ($height % 2 == 1) {
        $height++;
    }
    $till = 0;
    for ($i = 1; $i <= $height; $i++) {

        if ($i <= ($height / 2)) {
            $till++;
        } elseif ($i > ($height / 2) + 1) {
            $till--;
        } else {
        }

        for ($j = 1; $j <= $till; $j++) {
            if ($j == 1) {
                echo "*";
            } else {
                echo " *";
            }
        }
        echo "\n";
    }
}

pattern(11);
