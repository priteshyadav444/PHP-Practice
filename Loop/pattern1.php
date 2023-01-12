<?php
// *  
// * *  
// * * *  
// * * * *  
// * * * * *  

function pattern($height)
{
    for ($i=1; $i <= $height; $i++) { 
        for ($j=1; $j <= $i; $j++) { 
            if ($j == 1) {
                echo "*";
            } else {
                echo " *";
            }
        }
        echo "\n";
    }
}
pattern(10);
