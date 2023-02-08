<?php
$arr = array(12, 23, 421, 231, 3232);
print_r("Min" . min($arr, ...array(12, -23, 9421, 231, 3232)));
echo "\nMax";
print_r(max($arr, ...array(12, -23, 9421, 231, 3232)));
