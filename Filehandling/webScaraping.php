<?php
// $file = fopen("https://priteshyadav444.in", "r");
// $data = fread($file, filesize($file));
// print_r($data);
// fclose($file);

$url = "https://priteshyadav444.in/";


$data = file_get_contents($url);
$file = fopen("content.html", 'w');
fwrite($file, $data);
fclose($file);
