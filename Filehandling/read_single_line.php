<?php
$path = "content12.txt";

$file = fopen($path, 'r');
while (!feof($file))
    echo fgets($file);
