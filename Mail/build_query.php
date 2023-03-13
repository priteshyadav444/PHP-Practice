<?php
$params = array(
    'email' => "pritesh@mail.com",
    'password' => "123123213"
);
print_r(http_build_query($params));
