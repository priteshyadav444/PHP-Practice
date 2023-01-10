<?php
class Math
{
    const PI = 3.14;
    public function areaOfCircle($radius)
    {
        return 2 * self::PI * $radius;
    }
}

function defineContant(){
    if(!defined("PI"))
        define('PI', "3.14", false);
};


$maths = new Math();

echo $maths->areaOfCircle("1");
echo "<br>PI Value Outside Call:".MATH::PI;

defineContant();
// global $PI;
echo "<br>PI Value :".constant('PI');
// echo $GLOBALS['PI1'];
?>