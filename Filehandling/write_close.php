<?php
$path = "Filehandling/new.txt";
$content = "Pritesh yadav \n";

$file = fopen($path, 'a+');
fwrite($file, $content);
fclose($file);
