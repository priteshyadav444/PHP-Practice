<?php
class Foo
{
    public static $PI = 3.14;
    public function areaOfCircle($radius)
    {
        return 2 * $this->PI * $radius;
    }
}

$obj = new Foo();
echo $obj->areaOfCircle("1");
echo "<br>PI Value :".$obj->$PI;

defineContant();
echo "<br>PI Value :".$GLOBALS['PI'];
// echo $GLOBALS['PI1'];
?>