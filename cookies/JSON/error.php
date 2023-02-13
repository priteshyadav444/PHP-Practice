<?php

$json = json_decode('"some string"', true);
var_dump($json, json_last_error_msg());


$json = "{'name': 'Jeff', 'age': 20 }" ; // invalid json
$person = json_decode($json);
var_dump($person);
// echo $person->name; // Notice: Trying to get property of non-object: returns null
echo json_last_error();