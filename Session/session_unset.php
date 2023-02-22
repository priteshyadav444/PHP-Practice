<?php
session_start();

$_SESSION['name'] = "Pritesh";
echo "<pre>";
print_r($_SESSION);
session_unset();
$_SESSION['name'] = "Pritesh";

print_r($_SESSION);
