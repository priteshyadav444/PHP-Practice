<?php
//https://practice.geeksforgeeks.org/problems/edit-distance3702/1?page=1&status[]=solved&category[]=Strings&curated[]=1&sortBy=submissions
$dp = array();
function solve($str1, $str2, $length1, $length2)
{
    if ($length1 == 0)
        $dp[$length1][$length2] = $length2;
    if ($length2 == 0)
        $dp[$length1][$length2] = $length1;


    if ($str1[$length1 - 1] == $str2[$length2 - 1])
        $dp[$length1][$length2] = solve($str1, $str2, $length1 - 1, $length2 - 1);

    return 1 + min($dp[$length1 - 1][$length2], $dp[$length1 - 1][$length2 - 1], $dp[$length1][$length2 - 1]);
}

$str1 = 'sunday';
$str2 = 'saturday';

print_r(solve('sunday', 'saturday', strlen($str1), strlen($str2)));
