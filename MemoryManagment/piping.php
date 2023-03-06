<?php
// copying file using piping (stream)
$handle1 = fopen("php://filter/zlib.deflate/resource=content.txt", "r");
$handle2 = fopen("piping-files-2.txt", "w");
stream_copy_to_stream($handle1, $handle2);


fclose($handle1);
fclose($handle2);

// echo "<pre>";
// print_r(apache_request_headers());
// whole files copying usint at once
// file_put_contents(
//     "piping-files-1.txt",
//     file_get_contents("content.txt")
// );

require "memory.php";
