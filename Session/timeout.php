<?php
    setcookie('myvar', "123", time()+3600);
    var_dump($_COOKIE);
    session_start();
    $_SESSION["uid"] = "123";
    var_export($_SESSION["uid"]);
    print_r($_SESSION);

