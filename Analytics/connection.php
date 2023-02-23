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
    public function getListing()
    {
        $sql = "SELECT * FROM student order by name";
        $result = $this->connection->query($sql);
        return $result;
    }
    public function deleteListing($id)
    {
        $result = $this->connection->query("delete from student where id=$id");
        return $result;
    }
    public function updateListing($name, $email, $gender, $address, $qualification, $id)
    {
        $result = $this->connection->query("update student set name='" . $name . "', email='" . $email . "', gender='" . $gender . "', address='" . $address . "', qualification='" . $qualification . "' where id='$id' ");
        return $result;
    }
    public function getListingById($id)
    {
        $sql = "SELECT * FROM student where id=$id";
        $result = $this->connection->query($sql);
        return $result;
    }
}
