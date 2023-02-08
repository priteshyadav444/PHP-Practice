<?php
try {
    $path = "Filehandling/new.txt";
    $data = fopen($path, "w+");

    fwrite($data, fread($data, 123));
    fclose($data);
} catch (TypeError $e) {
    print_r("Error ");
}
