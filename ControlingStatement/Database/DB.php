<?php
class DB extends Validate
{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $db = "student_database";

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
  public function showAllTables()
  {
    $result = $this->connection->query("show tables from {$this->db}");

    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $message = "{$i}) {$row['Tables_in_student_database']}";
            Validate::echoit($message,1);
            $i++;
        }
    }

  }
  public function showTableData()
  {
    $table = readline('Enter Table Name :');
    $sql = "SELECT * FROM {$table}";
    try {
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            $i = 1;
            while ($row = $result->fetch_assoc()) {
               print_r($row);
            }
        }
    } catch (Exception $th) {
        Validate::echoit("NO_DATA_FOUND");
    }

  }
}
