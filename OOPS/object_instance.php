<?php
class A{
    function __construct()
    {
        echo "inside class A \n";
    }
}
class B extends A{
    function __construct()
    {
        parent::__construct();
        echo "inside class B \n";
    }
}

function foo(A $objectA){
    echo "inside Function Foo \n";
    
}
foo(new B())
?>