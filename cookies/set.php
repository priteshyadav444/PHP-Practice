<?php
// setrawcookie("userid", "123", time() + 300, "/", 'localhost', false);
setcookie("username", "priteshYadav", time() + 300, "/", "taskeasy.in");
// setcookie("username", "", time() - 3600);

echo "<pre>";
print_r($_COOKIE);
