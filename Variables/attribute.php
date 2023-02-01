<?php
$curl = curl_init();
$input = 'india';
$type = 'name';
curl_setopt_array($curl, [CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => 'http://192.168.1.85//php/countryapi/service.php']);

$res =  curl_exec($curl);
echo $res;
curl_close($curl);
