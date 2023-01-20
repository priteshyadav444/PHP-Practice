<?php
$json = '{"Title": "The Cuckoos Calling",
        "Author": "Robert Galbraith",
        "Detail": {
        "Publisher": "Little Brown"
        }}';
$result = (array)json_decode($json);

var_dump($result);

echo "Title : " . $result['Title'] . " \n";
echo "Author : " . $result['Author'] . " \n";
echo "Publisher : " . $result['Detail']->Publisher . " \n";

