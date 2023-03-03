<?php
$path = "content12.txt";
clearstatcache();
echo round((@filesize($path) / (1024 * 1024)), 2) . " MB";

// print_r(stat($path));
