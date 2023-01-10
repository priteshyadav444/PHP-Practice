<?php
$var = "Pritesh";
$fun1 = function () use ($var) {
    echo $var;
};
$fun1();
