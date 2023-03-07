<?php
$tracker->start();

use Tracker\Helper\DatabaseConfig;

include "../../Redis/vendor/autoload.php";

include 'connection.php';
include 'ObjectFormat.php';

$database = new DatabaseConfig("localhost", "root", "", "student_database");
$con = new ConnectionLog_Dub($database);

if (isset($_GET['logs'])) {
    if ($_GET['logs'] == "visitor") {
        $redis = new Predis\Client();
        $flag = true;
        if ($redis->exists("result") && $flag == true) {
            $data =  $redis->get("result");
            print_r($data);
            return;
        } else {
            $data = ObjectFormatter::format($con->getallVistorLog(), 200, "Success", "All Data Loaded");
            $redis->set("result", $data);
            $redis->expire("result", "300");
        }
        header("content-type:application/json");
        http_response_code(200);

        print_r($data);
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
