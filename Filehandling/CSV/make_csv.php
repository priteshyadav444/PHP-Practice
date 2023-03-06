<?php

include 'connection.php';

$conn = new Connection();
$result = $conn->getListing();

$fp = fopen('file.csv', 'w');

while ($student = $result->fetch_assoc()) {
    fputcsv($fp, $student, ",", '"', "\\", "\t\n");
}

fclose($fp);
