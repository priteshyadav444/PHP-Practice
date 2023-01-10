<?php
$x = 4;
function assignx()
{
    global $x;
    $x = 0;
    print "\$x inside function is $x. <br>";
}
assignx();
print "\$x outside of function is $x. <br>";

function test()
{
 $GLOBALS["myLocal"] = "local";
 $myLocal = $GLOBALS["myLocal"];
 var_dump($myLocal);
 var_dump($GLOBALS["myLocal"]);
}
test();
var_dump($GLOBALS["myLocal"]);
var_dump($myLocal);
?>
