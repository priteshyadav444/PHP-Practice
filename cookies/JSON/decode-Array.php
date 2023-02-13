<?php
// Returns an object (The top level item in the JSON string is a JSON dictionary)
$json_string = ' ["red", "blue"]';
$array = json_decode($json_string);
var_dump($array);
printf('Hello %s, You are %s years old.', $array[0], $array[1]);
