<?php
$validations = "required|max:123";
$validations = array_unique(explode("|", $validations)); // remove dublicate validation. 

foreach ($validations as $type) {
    echo "$type => ";

    var_dump(strpos($type, ":"));
}
