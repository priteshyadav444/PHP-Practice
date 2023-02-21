<?php
// set the cookies
setcookie("cookie[three]", "cookiethree", strtotime("+5 days"));
setcookie("cookie[two]", "cookietwo");
setcookie("cookie[one]", "cookieone");


// after the page reloads, print them out
echo "<pre>";
var_dump($_COOKIE);
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";
    }
}
