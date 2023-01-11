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
  private $table = "consolestudent";
  private $connection;
  public function __construct()
  {
    // Create connection
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

  public function getConnection(){
    return $this->connection;
  }

  public function insertStudent($name, $address){
    $query = "INSERT INTO {$this->table} (name, address) VALUES ('" . $name . "', '" . $address . "')";
    $result = $this->connection->query($query);
    return $result;
  }
  public function getStudents()
  {
    $sql = "SELECT * FROM {$this->table} order by id";
    $result = $this->connection->query($sql);
    return $result;
  }
  public function deleteStudent($id)
  {
    $result = $this->connection->query("delete from {$this->table} where id={$id}");
    return $result;
  }
  public function updateStudent($id, $name, $address)
  {
    $result = $this->connection->query("update {$this->table} set name='" . $name . "',  address='" . $address . "' where id='$id' ");
    return $result;
  }
  public function getStudentById($id)
  {
    $sql = "SELECT * FROM {$this->table} where id=$id";
    $result = $this->connection->query($sql);
    return $result;
  }
}

?>
