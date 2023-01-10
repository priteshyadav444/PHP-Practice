<?php

function add_prefix(&$name, $prefix = "Mr.")
{
    $name = $prefix.' '. $name;
    return $name;
}

$name = "Pritesh";
echo add_prefix($name);


function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}
echo makecoffee();
echo makecoffee(array("cappuccino", "lavazza"), "teapot");?>