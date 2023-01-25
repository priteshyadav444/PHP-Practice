<?php
function solve($string1, $string2)
{
    if (strlen($string1) != strlen($string2)) return -1;
    $map = array();

    for ($i = 0; $i < strlen($string1); $i++) {
        if (!isset($map[$string1[$i]])) {
            $map[$string1[$i]] = 1;
        } else {
            $map[$string1[$i]]++;
        }
    }
    for ($i = 0; $i < strlen($string2); $i++) {
        if (!isset($map[$string2[$i]])) {
            return -1;
        } else {
            $map[$string2[$i]]--;
        }
    }
    foreach ($map as $value) {
        if ($value > 0) {
            return false;
        }
    }
    return true;
}


var_dump(solve('tgzonrrftzq', 'tqzzrtnrftg'));
