<?php
$tracker->start();

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use

// Table's primary key

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
if (isset($_GET['logs'])) {
    if ($_GET['logs'] == 'visitor_logs') {
        $table = 'visitor_logs';
        $primaryKey = 'log_id';
        $columns = array(
            array('db' => 'created', 'dt' => 0),
            array('db' => 'log_id', 'dt' => 1),
            array('db' => 'page_url', 'dt' => 2),
            array('db' => 'referrer_url', 'dt' => 3),
            array('db' => 'user_ip_address', 'dt' => 4),
            array('db' => 'user_geo_location', 'dt' => 5),
            array('db' => 'device', 'dt' => 6)
        );
    } else if ($_GET['logs'] == 'engagement_logs') {
        $table = 'engagement_logs';
        $primaryKey = 'log_id';
        $columns = array(
            array('db' => 'last_visited_at', 'dt' => 0),
            array('db' => 'log_id', 'dt' => 1),
            array('db' => 'engagement_time', 'dt' => 2),
            array('db' => 'created', 'dt' => 3),
        );
    } else if ($_GET['logs'] == 'retention_logs') {
        $table = 'retantion_logs';
        $primaryKey = 'log_id';
        $columns = array(
            array('db' => 'created', 'dt' => 0),
            array('db' => 'log_id', 'dt' => 1),
        );
    } else {
        return json_encode(['statuscode' => 404]);
    }
}



// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'student_database',
    'host' => 'localhost'
    // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('scripts/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
