<?php

$handle1 = fopen(
    "php://filter/zlib.deflate/resource=content.txt",
    "r"
);

$handle2 = fopen(
    "filters-2.txt",
    "w"
);

stream_copy_to_stream($handle1, $handle2);

fclose($handle1);
fclose($handle2);

require "memory.php";

// print file_get_contents("php://filter/zlib.inflate/resource=filters-2.deflated");