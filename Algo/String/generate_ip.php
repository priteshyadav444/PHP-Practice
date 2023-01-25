<?php
function check($str)
{
    $length = strlen($str);
    if ($length <= 0 || $length > 3)
        return false;

    if ($length > 1 and $str[0] == '0')
        return false;

    if ($str < 0 || $str > 255)
        return false;

    return true;
}

function validIp($str, $firstIndex, $secondIndex, $thirdindex)
{
    $length = strlen($str);
    $firstSubstring = substr($str, 0, $firstIndex + 1);
    $secondSubstring = substr($str, $firstIndex + 1, $secondIndex - $firstIndex);
    $thirdSubstring = substr($str, $secondIndex + 1, $thirdindex - $secondIndex);
    $fourthSubstring = substr($str, $thirdindex + 1, $length - $thirdindex - 1);


    if (check($firstSubstring) && check($secondSubstring) && check($thirdSubstring) && check($fourthSubstring)) {
        $result = "$firstSubstring.$secondSubstring.$thirdSubstring.$fourthSubstring";
        return $result;
    } else
        return "";
}
function solve($str, $length)
{
    $ans = array();
    for ($i = 0; $i < $length - 3; $i++) {
        for ($j = $i + 1; $j < $length - 2; $j++) {
            for ($k = $j + 1; $k < $length; $k++) {
                $res = validIp($str, $i, $j, $k);
                if ($res != "") {
                    array_push($ans, $res);
                }
            }
        }
    }
    if (count($ans) == 0) return -1;
    return $ans;
}

$str = "6207291";
print_r(solve($str, strlen($str)));
