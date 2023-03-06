<?php

// Reading Data using Yield 
function readTheFile($path)
{
    $handle = fopen($path, "r");

    while (!feof($handle)) {
        yield trim(fgets($handle));
    }

    fclose($handle);
}

$iterator = readTheFile("content.txt");

$buffer = "";

foreach ($iterator as $iteration) {
    preg_match("/\n{3}/", $buffer, $matches);
    print_r($matches);
    if (count($matches)) {
        print ".";
        $buffer = "";
        echo "Inside";
    } else {
        $buffer .= $iteration . PHP_EOL;
    }
}
// Reading Whole data At Once
// function readTheFile($path)
// {
//     $lines = [];
//     $handle = fopen($path, "r");

//     while (!feof($handle)) {
//         $lines[] = trim(fgets($handle));
//     }

//     fclose($handle);
//     return $lines;
// }



require "memory.php";
