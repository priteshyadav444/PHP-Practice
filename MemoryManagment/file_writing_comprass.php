<?php
stream_filter_append($fp, 'zlib.deflate', STREAM_FILTER_WRITE);
fwrite($fp, 'This is some data that will be compressed.');
