<?php
echo "<pre>";
echo "PHP SESSION :" . session_status();
session_start();
echo "PHP SESSION :" . session_status();

$_SESSION['name'] = "pritesh";
var_dump($_SESSION);
var_dump(session_get_cookie_params());
$_SESSION = array();
var_dump(session_get_cookie_params());
var_dump($_SESSION);

// var_dump($_SESSION['name']);
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
    echo "PHP SESSION :" . session_status();
}
