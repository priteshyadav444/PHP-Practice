<?php
$rawdata = file_get_contents("php://input");
// Let's say we got JSON
$decoded = (object)json_encode($rawdata);

var_dump($rawdata);

// print_r($_SERVER['SERVER_PROTOCOL']);
