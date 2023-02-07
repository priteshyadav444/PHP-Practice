<?php
echo date_default_timezone_get();

date_default_timezone_set("Asia/Calcutta");
echo date_default_timezone_get();



$timezone_identifiers = DateTimeZone::listIdentifiers();

foreach ($timezone_identifiers as $key => $list) {

    echo $list . "\n";
}
