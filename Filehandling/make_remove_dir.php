<?php
try {
    if (@mkdir("Folder123", recursive: true)) {
        @rmdir("Folder");
    } else {
        echo "File Not Created";
    }
} catch (Exception $e) {
    print_r($e);
}
