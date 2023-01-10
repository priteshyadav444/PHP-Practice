<?php
$username = "Pritesh";
$email = "pritesh@gmail.com";

$name = ['abc', 'pqr', 'xyz'];
$var = compact('username', 'email');

print_r($var);
echo "<br> ";

print_r(compact('name'));
print_r(compact($name));
