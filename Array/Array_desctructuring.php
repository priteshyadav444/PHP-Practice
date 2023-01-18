<?php
function return_numbers()
{
    return [0, 1, 2];
}
[$zero, $one, $two] = return_numbers();
echo $zero, $two, $one . "<br>";

list($zero, $one, $dir) = return_numbers();

echo $zero, $two, $one . "<br>";

$arr1 = [1, 2, 3];
$arr2 = [...$arr1]; //[1, 2, 3]
$arr3 = [0, ...$arr1]; //[0, 1, 2, 3]
$arr4 = [...$arr1, ...$arr2, 111]; //[1, 2, 3, 1, 2, 3, 111]

$arr = ['name'=> 'Pritesh'];
$arr5 = [...$arr1, ...$arr1, ...$arr]; //[1, 2, 3, 1, 2, 3]

print_r($arr1);
print_r($arr2);
print_r($arr3);
print_r($arr4);
print_r($arr5);


# Keys that are neither integers nor strings throw a TypeError. Such keys can only be generated by a Traversable object. Prior to PHP 8.1, unpacking an array 