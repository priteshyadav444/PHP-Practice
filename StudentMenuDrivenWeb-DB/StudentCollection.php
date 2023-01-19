<?php
include_once './Student.php';
include_once '../ValidateProgram/Validate.php';
include './StudentDB.php';

class StudentCollection extends Validate
{
    private $objects = [];
    private $DB;
    public function __construct()
    {
        $this->DB = new Connection();
    }
    public function getAll()
    {
        $result = $this->DB->getStudents();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = new Student($row['id'], $row['name'], $row['address']);
                array_push($this->objects, $student);
            }
        }
        print_r(Validate::format($this->objects, 200, "DATA_FOUND"));
    }
    // public function resetObjects()
    // {
    //     $this->objects = array();
    // }
    // public function createStudent()
    // {
    //     $student = new Student();
    //     $student->readData();
    //     if ($this->DB->insertStudent($student->getName(), $student->getAddress())) {
    //         parent::echoit("Record Inserted!!");
    //         self::popolateState();
    //     } else {
    //         Validate::echoit("Request Failed!!");
    //     }
    // }
    // public function showAllStudent()
    // {
    //     if (count($this->objects) == 0) {
    //         echo "No Record Found !! \n\n";
    //         return;
    //     }
    //     foreach ($this->objects as $key => $obj) 
    //         $$obj->getData();
    // }

    // public function deleteStudent()
    // {
    //     if (count($this->objects) == 0) {
    //         parent::echoit("Dataset is Empty!!");
    //         return;
    //     }
    //     $id = parent::extractInteger(readLine("Enter Id : "));
    //     $flag = false;
    //     if ($this->DB->deleteStudent($id)) {
    //         self::popolateState();
    //         $flag = true;
    //     }

    //     if ($flag === false) {
    //         echo "Record Not Found!!! \n\n";
    //     }
    // }

    // public function searchStudent()
    // {
    //     if (count($this->objects) == 0) {
    //         parent::echoit("Dataset is Empty!!");
    //         return;
    //     }
    //     $id = Validate::extractInteger(readLine("Enter Id to Update: "));
    //     $flag = false;
    //     foreach ($this->objects as $key => $obj) {
    //         $currentObject = $obj;
    //         if ($currentObject->checkId($id)) {
    //             Validate::echoit("\nRecords Found !!",1);
    //             $currentObject->getData();
    //             $flag = true;
    //         }
    //     }
    //     if ($flag === false) {
    //         echo "Record Not Found!!! \n\n";
    //     }
    // }

    // public function updateStudent()
    // {
    //     $flag = false;
    //     if (count($this->objects) == 0) {
    //         parent::echoit("Dataset is Empty!!");
    //         return;
    //     }
    //     $id = Validate::extractInteger(readLine("Enter Id to Update: "));
    //     foreach ($this->objects as $key => $obj) {
    //         $currentObject = $obj;
    //         if ($currentObject->checkId($id)) {
    //             $student = new Student();
    //             $student->readData();
    //             if ($this->DB->updateStudent($id, $student->getName(), $student->getAddress())) {
    //                 Validate::echoit("Records Updated");
    //                 self::popolateState();
    //                 $flag = true;
    //             }
    //         }
    //     }
    //     if ($flag === false) {
    //         echo "Record Not Found!!! \n\n";
    //     }
    // }
}

if (isset($_SERVER['REQUEST_METHOD']) == 'GET') {
    header("Content-Type: application/json");
    $student = new StudentCollection();
    print_r($student->getAll());
}

