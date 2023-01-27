<?php
function isSame($str, $length)
{
    if ($length == 0 || $length == 1)
        return 1;
    for ($i = 0; $i < $length / 2; $i++) {
        if ($str[$i] !== $str[($length / 2 - 1) + $i]) {
            return -1;
        }
    }
    return ($length / 2);
}
//allowed opeartion is writing and copy last n charecter only once
function solve($inputString, $length)
{
    if ($length == 1) return 1;
    $ans = 0;

    for ($j = 0; $j < $length - 1; $j++) {
        $substr = substr($inputString, $j, $length - $j);
        $substrLength = strlen($substr);
        for ($i = 0; $i <= $substrLength / 2; $i++) {
            // checking same lenth substr from i+1
            if (substr($substr, 0, $i + 1) == substr($substr, $i + 1, $i + 1))
                $ans = max($ans, ($i + 1)); // storing maximum substr repeating
        }
    }

    if ($ans >= $length or $ans == 0)
        return $length;

    $ans = ($length - $ans) + 1;
    return $ans;
}

$str = 'abcabcaa'; // 6
$str = 'kabcabcaa'; // 7
$str = 'abcabc'; // 4
$str = 'abckabc'; // 7
$str = 'abcabca'; // 5
$str = 'b'; // 5
$str = 'kabcabcaak'; // 7



print_r(solve($str, strlen($str)));
