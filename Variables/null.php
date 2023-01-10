<?php
$nullvar = null;
unset($nullvar);
// if ($nullvar === null) { echo "inside Null"; }
// if (is_null($nullvar)) { echo "inside is_Null";  }


$nullvar = null; // directly
function doSomething() {  } // this function does not return anything
$nullvar = doSomething();
var_dump($nullvar);