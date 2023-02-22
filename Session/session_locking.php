<?php
session_start();
echo "Session Start <br>";
var_dump(session_write_close());

$_SESSION['id'] += 1;

echo $_SESSION['id'];

sleep(5);
echo $_SESSION['id'];
