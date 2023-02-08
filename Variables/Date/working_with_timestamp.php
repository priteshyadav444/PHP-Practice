<?php
// convertio using date in string
$timestamp = strtotime("12-12-21");
echo "Timestamp : ".$timestamp;
// convertion using DateTime format
$date = new DateTime("12-12-21");
echo "\nTimestamp : " . $date->getTimeStamp();

// using format method
echo "\nTimestamp : " . $date->format('U');
