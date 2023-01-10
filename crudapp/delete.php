<?php
include('connection.php');
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $connection = new Connection();
    if ($connection->deleteListing($id)) {
        $newUrl = "./home.php";
        echo "Record Deleted";
        // header('Location: ' . $newUrl);
    } else {
        echo "Error: ";
    }
}
