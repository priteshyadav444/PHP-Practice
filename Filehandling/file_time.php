<?php
$path = "Filehandling/new.txt";
echo "Last Access time : " . date("d-m-y ", fileatime($path));
echo "\n";
echo "Last Changed time : " . date("d-m-y ", filectime($path));
echo "\n";
echo "Last Modification time : " . date("F d Y H:i:s", filemtime($path));
