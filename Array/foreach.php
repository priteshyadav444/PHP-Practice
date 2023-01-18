<?php
$array = array(1, 2);
$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo "\nChecking $i: \n";
    echo "Bad: " . $array[$i] . "\n";
    echo "Good: " . $array[$i] . "\n";
    echo "Bad: {$array[$i]}\n";
    echo "Good: {$array[$i]}\n";
}
?>