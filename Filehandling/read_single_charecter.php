<?php
$path = "Filehandling/new.txt";

$file = fopen($path, 'r');
echo fgetc($file);
echo fgetc($file);
for ($i = 0; $i < filesize($path);) {
    echo fgetc($file);
    $i++;
}
