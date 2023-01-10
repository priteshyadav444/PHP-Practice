<?php
const EARTH_IS_FLAT  =  "EARTH_IS_FLAT";
const APP_ENV_UPPERCASE  =  "APP_ENV_UPPERCASE";
if (EARTH_IS_FLAT) {
    print "Earth is flat \n";
}
print_r (APP_ENV_UPPERCASE);

$const1 = "EARTH_IS_FLAT";
$const2 = "APP_ENV_UPPERCASE";

if (constant($const1)) {
    print "Earth is flat \n";
}
print_r(constant($const2));
