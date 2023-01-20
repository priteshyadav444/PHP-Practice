<?php
function string_range($str1)
{
    preg_match_all("/([0-9]{1,2})-?([0-9]{0,2}) ?,?;?/", $str1, $a);
    $x = array();
    print_r($a);
    foreach ($a[1] as $k => $v) {
        print_r($v);
        // echo "\n";
        $x  = array_merge($x, range($v, (empty($a[2][$k]) ? $v : $a[2][$k])));
    }
    return ($x);
}
$test_string = '1-2 18-24 9-20';
print_r(string_range($test_string));
