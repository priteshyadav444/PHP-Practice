<?php
$str = 'hello, "Pritesh"';
// $str = "Pritesh";
$str2 = "Pritesh";
// unset($str);
echo "<pre>";
echo "String Reverse :" . strrev($str) . "<br>";
echo "String Upper :" . strtoupper($str) . "<br>";
echo "String Lower :" . strtolower($str) . "<br>";
echo "String First Word Capital :" . ucwords($str) . "<br>";
echo "String Compare :" . strcmp($str, $str2) . "<br>";
echo "String Replace :" . str_replace("Pritesh", "Nitesh", $str) . "<br>";
echo "String length :" . strlen($str) . "<br>";
echo "String Total Count :" . str_word_count($str) . "<br>";
echo "String Binary:" . bin2hex($str) . "<br>";
print_r(str_split($str, 3));

$haystack = "abc xyz pqr";
$needle = "abc";
$idx = strpos($haystack, $needle);

echo "index $idx";

if ($idx !== false) {
    echo "Inside true <br>";
} else {
    echo "Inside false <br>";
}
