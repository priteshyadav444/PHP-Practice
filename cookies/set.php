<?php
// $time = DateInterval::createFromDateString("3600");
echo "<pre>";
setcookie("userid", "123", time() + 300);
var_dump($_COOKIE);
