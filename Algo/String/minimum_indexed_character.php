<?php

use function PHPSTORM_META\map;

function solve($string1, $string2)
{
    $len1 = strlen($string1);
    $len2 = strlen($string2);
    $ans = PHP_INT_MAX;
    $map = array();

    for ($i = 0; $i < $len2; $i++) {
        for ($j = 0; $j < $len1; $j++) {
            if (isset($map[$string2[$i]])) {
                break;
            }
            if ($string1[$j] == $string2[$i]) {
                $ans = $ans > $j ? $j : $ans;
                break;
            }
        }
        if ($j == $len1) {
            $map[$string2[$i]] = -1;
        }
    }
    if ($ans == PHP_INT_MAX) return -1;
    return $ans;
}
print_r(solve('geeksfoaytrgeeks', 'kkt'));
