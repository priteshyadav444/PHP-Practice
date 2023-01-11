<?php
include_once './Student.php';
include_once '../ValidateProgram/Validate.php';
include './StudentDB.php';

class StudentCollection extends Validate
{
    private $objects = array();
    private $DB;
    public function __construct()
    {
        $this->DB = new Connection();
        self::populateStudent();
    }
    public function populateStudent()
    {
        $result = $this->DB->getStudents();
        self::resetObjects();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $student = new Student($row['id'], $row['name'], $row['address']);
                array_push($this->objects, $student);
            }
        }
        // else{
        //     parent::echoit("No Record Found!!");

        // }
    }
    public function resetObjects()
    {
        $this->objects = array();
    }
    public function createStudent()
    {
        $student = new Student();
        $student->readData();
        if ($this->DB->insertStudent($student->getName(), $student->getAddress())) {
            parent::echoit("Record Inserted!!");
            self::populateStudent();
        } else {
            parent::echoit("Request Failed!!");
        }
    }
    public function showAllStudent()
    {
        if (count($this->objects) == 0) {
            echo "No Record Found !! \n\n";
            return;
        }
        foreach ($this->objects as $key => $obj) {
            $currentObject = $obj;
            $currentObject->getData();
        }
    }

    public function deleteStudent()
    {
        if (count($this->objects) == 0) {
            parent::echoit("Dataset is Empty!!");
            return;
        }
        $id = parent::extractInteger(readLine("Enter Id : "));
        $flag = false;
        if ($this->DB->deleteStudent($id)) {
            parent::echoit("Records Deleted \n\n");
            self::populateStudent();
            $flag = true;
        }

        if ($flag === false) {
            echo "Record Not Found!!! \n\n";
        }
    }

    public function searchStudent()
    {
        if (count($this->objects) == 0) {
            parent::echoit("Dataset is Empty!!");
            return;
        }
        $id = readLine("Enter Id To Search: ");
        $flag = false;
        foreach ($this->objects as $key => $obj) {
            $currentObject = $obj;
            if ($currentObject->checkId($id)) {
                parent::echoit("\nRecords Found !!");
                $currentObject->getData();
                $flag = true;
            }
        }
        if ($flag === false) {
            echo "Record Not Found!!! \n\n";
        }
    }

    public function updateStudent()
    {
        $flag = false;
        if (count($this->objects) == 0) {
            parent::echoit("Dataset is Empty!!");
            return;
        }
        $id = readLine("Enter Id to Update: ");
        foreach ($this->objects as $key => $obj) {
            $currentObject = $obj;
            if ($currentObject->checkId($id)) {
                $student = new Student();
                $student->readData();
                if ($this->DB->updateStudent($id, $student->getName(), $student->getAddress())) {
                    parent::echoit("Records Updated \n\n");
                    self::populateStudent();
                    $flag = true;
                }
            }
        }
        if ($flag === false) {
            echo "Record Not Found!!! \n\n";
        }
    }
}
