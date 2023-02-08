<?php
$path = "Filehandling/new.txt";

$file = fopen($path, 'r');
while (!feof($file))
    echo fgets($file);
