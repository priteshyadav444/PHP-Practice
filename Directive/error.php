<?php
$error_log = file_get_contents('/apache/logs/error.log');
echo $error_log;
