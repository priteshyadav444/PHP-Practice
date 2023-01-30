<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "student_database";
// echo "Connected successfully";
class Connection
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
    mysqli_close($this->connection);
  }

  public function getConnection()
  {
    return $this->connection;
  }

  public function insertListing($name, $email, $gender, $address, $qualification)
  {
    $result = $this->connection->query("INSERT INTO student (id, name, email, gender, address, qualification) VALUES (NULL, '" . $name . "', '" . $email . "', '" . $gender . "', '" . $address . "', '" . $qualification . "')");
    return $result;
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
