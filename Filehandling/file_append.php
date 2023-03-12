<?php
$file_name = 'rough.txt';
if (!file_exists($file_name)) {
    echo "File not Exits";
    exit;
}

$file_handler = fopen($file_name, 'r+');
$content = $result = '';

while (!feof($file_handler)) {
    $content .= fgets($file_handler);
}

$pos = strpos($content, 'quo ');
fseek($file_handler, $pos);

$pos_found = false;
while (fgetc($file_handler) != ' ' && !feof($file_handler)) {
    $pos_found = true;
    continue;
}

if ($pos_found == false) {
    echo "File Not Updated";
} else {
    fwrite($file_handler, 'hehe ', 5);
}
fclose($file_handler);
