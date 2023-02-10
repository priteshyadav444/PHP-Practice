<?php
$cmd = "dir";
exec($cmd, $stdout);
print_r($stdout);

print_r(scandir("/"));
