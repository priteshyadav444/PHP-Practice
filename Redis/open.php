<?php
function Foo(?string &$args)
{
    echo "Called $args";
}
$data = "Bar";
Foo($data);
