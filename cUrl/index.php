<?php
# create a cURL handle
$ch = curl_init();
# set the URL (this could also be passed to curl_init() if desired)
curl_setopt($ch, CURLOPT_URL, "https://www.example.com");
# set the HTTP method to POST
curl_setopt($ch, CURLOPT_POST, true);
# setting this option to an empty string enables cookie handling
# but does not load cookies from a file
curl_setopt($ch, CURLOPT_COOKIEFILE, "");
# set the values to be sent
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    "username" => "joe_bloggs",
    "password" => "up3r_$3cr3t",
));
# return the response body
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
# send the request
$result = curl_exec($ch);
var_dump($result);
