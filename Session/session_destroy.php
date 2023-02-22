<?php
session_start();
$_SESSION['name1'] = "Pritesh";

echo "<pre>";
print_r($_SESSION);



var_dump(session_destroy());


print_r($_SESSION);
