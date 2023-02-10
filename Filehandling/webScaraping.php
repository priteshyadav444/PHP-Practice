<?php
// $file = fopen("https://priteshyadav444.in", "r");
// $data = fread($file, filesize($file));
// print_r($data);
// fclose($file);
$url = "https://docs.google.com/document/u/0/";

// $data = file($url);
$data = file_get_contents($url);
$file = fopen("content.txt", 'w');
fwrite($file, $data);
fclose($file);
