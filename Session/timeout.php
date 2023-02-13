<?php
setcookie('myvar', "123", time() + 3600, "/", "", "true");
session_start();
$_SESSION["myvar"] = "123";

echo "<pre>";
var_export($_SESSION["myvar"]);

echo "Session :";
print_r($_SESSION);
echo "Cookies :";
print_r($_COOKIE);
session_destroy();
