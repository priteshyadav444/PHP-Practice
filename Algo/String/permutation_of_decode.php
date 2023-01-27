<?php
function solve($str, $length)
{
    if ($str[0] == '0')
        return 0;
    $dp = array_fill(0, $length, 0);
    $dp[0] = 1;
    $dp[1] = 1;
    $mod = 1e9 + 7;
    for ($i = 2; $i <= $length; $i++) {
        if ($str[$i - 1] > 0) {
            $dp[$i]  = $dp[$i - 1] % $mod;
        }
        if ($str[$i - 2] == 1 || $str[$i - 2] == 2 && $str[$i - 1] <= 6) {
            $dp[$i] = ($dp[$i] + $dp[$i - 2]) % $mod;
        }
    }
    return $dp[$length];
}

$inputStr = '3468';
print_r(solve($inputStr, strlen($inputStr)));
