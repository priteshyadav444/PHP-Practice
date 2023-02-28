<?php
$tracker->start();

use Tracker\Helper\DatabaseConfig;

include 'connection.php';
include 'ObjectFormat.php';

$database = new DatabaseConfig("localhost", "root", "", "student_database");
$con = new ConnectionLog_Dub($database);

if (isset($_GET['logs'])) {
    if ($_GET['logs'] == "visitor") {
        header("content-type:application/json");
        http_response_code(200);

        print_r(ObjectFormatter::format($con->getallVistorLog(), 200, "Success", "All Data Loaded"));
    } else {

        header("content-type:application/json");
        http_response_code(301);
        print_r(ObjectFormatter::format(array(), 400, "BAD REQUEST", "Invalid logs type"));
    }
} else {
    header("content-type:application/json");
    http_response_code(301);
    print_r(ObjectFormatter::format(array(), 400, "BAD REQUEST", "Invalid Request"));
}
