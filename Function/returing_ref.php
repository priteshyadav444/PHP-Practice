<?php

function &returns_reference()
{
    $someref = 123;
    return $someref;
}

$newref =& returns_reference();
echo $newref;
$newref = 321;
echo $someref;

?>