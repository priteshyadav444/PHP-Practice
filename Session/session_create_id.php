<?php
session_start();
session_start();

echo "<pre>";
$_SESSION['name'] = "pritesh";

session_regenerate_id();
session_create_id("Pritsh");



@var_dump($_SESSION);
