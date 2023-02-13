<?php
// Returns an object (The top level item in the JSON string is a JSON dictionary)
$json_string = '{"name": "Jeff", "age": 20, "active": true, "colors": ["red", "blue"]}';
$object = json_decode($json_string);
var_dump($object);
printf('Hello %s, You are %s years old.', $object->name, $object->age);

//To return an associative array for JSON objects instead of returning an object, pass true as the second parameter
$json_string = '{"name": "Jeff", "age": 20, "active": true, "colors": ["red", "blue"]}';
$array = json_decode($json_string, true); // Note the second parameter
var_dump($array);
