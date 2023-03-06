<?php
file_put_contents("php://filter/write=string.rot13/resource=file:///path/to/content.txt", "Hello World");

// Read data and encode/decode
readfile("php://filter/read=string.toupper/resource=https://www.priteshyadav444.in");
// stream_filter_append($handle1,  'zlib.deflate', STREAM_FILTER_WRITE);
