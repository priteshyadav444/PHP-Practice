<?php
session_start();
print_r($_SESSION);
var_dump(isset($_SESSION['name']));
