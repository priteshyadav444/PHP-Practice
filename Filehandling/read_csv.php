<?php
$path = "csv.txt";
$file = fopen($path, "r");

while (($line = fgetcsv($file) )!== false) {
    print_r($line);
}

fclose($file);
