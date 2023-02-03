<?php
class Foo
{
    public $name = "Pritesh";
    protected $age = 19;
    private $address = "Vapi";

    public function fun1()
    {
        echo "inside Function One \n";
        return $this;
    }
    public function fun2()
    {
        echo "inside Function Two \n";
        return $this;
    }
}

$obj = new Foo();
print_r($obj->fun1()->fun2()->name);
