<?php
session_start();
echo "Session Id:";
echo $_SESSION['id'];



$_SESSION['id'] += 1;
