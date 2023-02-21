<?php

$Seperator = '--';
$uniqueID = 'Ju?hG&F0yh9?=/6*GVfd-d8u6f86hp';
$Data = 'Ahmet ' . md5('123456789');

setcookie('VerifyUser', $Data . $Seperator . md5($Data . $uniqueID));
$_COOKIE['test'] = "Pritesh";

if ($_COOKIE) {
    $Cut = explode($Seperator, $_COOKIE['VerifyUser']);
    if (md5($Cut[0] . $uniqueID) === $Cut[1]) {
        $_COOKIE['VerifyUser'] = $Cut[0];
    } else {
        die('Cookie data is invalid!!!');
    }
}

echo $_COOKIE['VerifyUser'];
