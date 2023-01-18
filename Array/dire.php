<?php
// fill an array with all items from a directory
$handle = opendir('../Array');
print_r($handle);
while (false !== ($file = readdir($handle))) {
    // echo "File Name $file";
    $files[] = $file;
}
// print_r($files);
closedir($handle); 
?>