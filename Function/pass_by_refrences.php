<?php
    function add_prefix(&$name)
    {
        $name = "Mr.".$name;
    }
    $name = "Pritesh";
    add_prefix($name);
    echo $name;