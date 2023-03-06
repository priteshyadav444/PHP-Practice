<?php
// using stream php://stdout stream
$file1 = fopen("https://raw.githubusercontent.com/assertchris/uploads/main/rick.jpg", "r");
$file2 = fopen("newimage.jpg", "w");

stream_copy_to_stream($file1, $file2);
print_r(stat("newimage.jpg"));
fclose($file1);
fclose($file2);

//copy using stream
// $file1 = fopen("https://raw.githubusercontent.com/assertchris/uploads/main/rick.jpg", "r");
// $file2 = fopen("newimage.jpg", "w");

// stream_copy_to_stream($file1, $file2);
// fclose($file1);
// fclose($file2);

// copying whole image at once
// file_put_contents("new.jpg", file_get_contents('https://raw.githubusercontent.com/assertchris/uploads/main/rick.jpg'));
// include 'memory.php';
