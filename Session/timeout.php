<?php
@session_start();
@session_start();

$_SESSION["myvar"] = array("pRITESH", "yADAV");
$_SESSION["my|!12"] = "Pritesh";

echo "<pre>";

print_r(session_id());
print_r(session_id());
print_r(session_id());

echo "{$_SESSION['my|!12']} <br>";
echo "Session :";

print_r($_SESSION);

echo "<br>Cookies :";
print_r($_COOKIE);

$_SESSION['usenname'] = "username";
$_SESSION['password'] = "password";

print_r($_SESSION);
session_destroy();
