<?php
$array1 = ['apples', 'grapes', 'papaya'];
$array2 = array('pritesh', 'nitesh', 'umesh');
echo "<pre>";
print_r($array1);
print_r($array2);

echo "<br><br>Filtering in array <br>";

$array2 = array('nitesh' => 234, 'pritesh' => 222, 'nitesh' => 234, 'umesh' => 313, "", null);
print_r($array2);

$filteredArray = array_filter($array2);
print_r($filteredArray);
$filteredArray = array_filter($array2, function ($val) {
    return $val > 200;
});
print_r($filteredArray);

$filteredArray = array_filter($array2, function ($key) {
    return $key == 'nitesh';
}, ARRAY_FILTER_USE_KEY);
print_r($filteredArray);


echo "<br><br>Array Reduce <br>";
$result = array_reduce($array1, function ($carry, $val) {
    return $carry .= $val . "-";
});
echo "Concatination" . $result . "<br>";

$arrayNum = [1, 2, 12, 3, 4];
$result = array_reduce($arrayNum, function ($carry, $val) {
    return $carry += $val;
});
echo "Sum :" . $result . "<br>";
$result = array_reduce($arrayNum, function ($max, $val) {
    return  $val > $max ? $val : $max;
});
echo "maximum num" . $result . "<br>";

echo "<br><br>Array Push <br>";
$arrayNum = [1, 2, 3, 4];
print_r($arrayNum);
array_push($arrayNum, 5, 6);
print_r($arrayNum);


echo "<br><br>Mapping in array <br>";
$callbackFunction = function ($a1, $a2) {
    return "$a2:$a1";
};
$mappedarray = array_map($callbackFunction, $array1, $array2);
print_r($mappedarray);


//array destructing
echo "<br><br>Array Destructuring<br>";
[$a, $b, $c] = $array1;
echo "$a" . "</br>";
echo "$b" . "</br>";
echo "$c" . "</br>";

// list($a, $b, $c) = $array1;
// echo "$a"."</br>";
// echo "$b"."</br>";
// echo "$c"."</br>";

// array looping with call back and it return values with array()

echo "<br><br>array  Walked <br>";
array_walk($array1, function ($a1) {
    echo $a1 . "<br>";
});


// echo assert(count($array1) === count($array2));

// combing array
echo "<br><br>Combined array <br>";
$combinedArray = array_combine($array2, $array1);
print_r($combinedArray);

// reverse loop
echo "<br><br>Reverse Loop <br>";

for ($i = count($array1) - 1; $i >= 0; $i--) {
    echo "<br>$array1[$i]";
}

// array with non increment index or key
echo "<br><br>Array with non increment Index in array <br>";
$arrayKeys = array_keys($combinedArray);
$arrayValues = array_values($combinedArray);
print_r($combinedArray);
print_r($arrayKeys);
for ($i = 0; $i < count($arrayKeys); $i++) {
    echo "<br>" . $combinedArray[$arrayKeys[$i]];
}

// loop by refrence
echo "<br><br>loop By refrence <br>";

print_r($array1);
foreach ($array1 as &$val) {
    if ($val == "grapes") {
        $val = "Orange";
    }
}
print_r($array1);

echo "<br><br>Array Spliting <br>";

$splitedArray = array_chunk($array1, 1);
print_r($splitedArray);

echo "<br><br>imploding array with keys and values Spliting <br>";
print_r($combinedArray);
print_r(implode(" ", array_values($combinedArray)));
echo "<br";
$arrayKeys = array_keys($array1);
print_r($arrayKeys);
// print_r(implode(" ", array_keys($array1)));
