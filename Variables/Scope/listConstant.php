<?php
$constants = get_defined_constants();
define("HELLO", "hello");
define("WORLD", "world");
$new_constants = get_defined_constants();
$myconstants = array_diff_assoc($new_constants, $constants);
var_export($myconstants);
