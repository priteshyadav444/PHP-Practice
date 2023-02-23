<?php

class ConnectionLog
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "student_database";

    private $connection;

    public function __construct()
    {
        # Create connection
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->db) or die("Connect failed: %s\n" . $this->connection->error);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    public function __destruct()
    {
        # echo "Connection Close";
        $this->connection->close();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function insertVisitorLog($data)
    {
        $query  = "INSERT INTO `visitor_logs`( `page_url`, `referrer_url`, `user_ip_address`, `user_geo_location`, `user_agent`, `device`) VALUES (?,?,?,?,?,?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("ssssss", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
        $statement->execute();
    }
    public function insertRetentionLog($data)
    {
        $query  = "INSERT INTO `retantion_logs`(`log_id`) VALUES (?)";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("s", $data[0]);
        $statement->execute();
    }
    public function insertEngagementLog($data)
    {
        $query  = "SELECT * FROM `engagement_logs` WHERE `log_id`=? limit 1";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("i", $data[0]);
        $statement->execute();

        $result = $statement->get_result(); // get the mysqli result
        var_dump($result);
        if ($result->num_rows == 0) {
            $query  = "INSERT INTO `engagement_logs`(`log_id`) VALUES (?)";
            $statement = $this->connection->prepare($query);
            $statement->bind_param("s", $data[0]);
            $statement->execute();
        }
    }
    public function updateEngagementLog($data)
    {
        $query  = "UPDATE `engagement_logs` SET `engagement_time`=? WHERE `log_id`=?";
        $statement = $this->connection->prepare($query);
        $statement->bind_param("ii", $data[0], $data[1]);
        $statement->execute();
    }
}
