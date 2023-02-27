$database = new Database("localhost", "root", "", "student_database");
$obj = new Analytics(new UserInfo(), new ConnectionLog($database), new IdConfig());
$obj->track();