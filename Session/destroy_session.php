<?php
echo "<pre>";
echo "PHP SESSION :" . session_status();
session_start();
echo "PHP SESSION :" . session_status();

$_SESSION['name'] = "pritesh";
var_dump($_SESSION);


// var_dump($_SESSION['name']);
session_unset();

echo "<pre>";
echo "PHP SESSION :" . session_status();
echo "PHP SESSION :" . session_status();

$_SESSION['name'] = "pritesh";
var_dump($_SESSION);

if (session_status() == PHP_SESSION_ACTIVE) {
    // session_destroy();
    echo "PHP SESSION :" . session_status();
}
