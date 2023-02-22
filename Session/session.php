<?php
//Set the session name
session_name("userid");
//Set session Value
session_id("qw");
//
var_dump(session_get_cookie_params());
// regsiter sesiion

$arr = array("user" => "priteh", "pass" => 123);


// session_register(...$arr);
// generate new session id
var_dump(session_create_id("aa"));
//Start the session
session_start();
