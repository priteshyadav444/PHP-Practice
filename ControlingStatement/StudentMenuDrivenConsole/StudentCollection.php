<?php
include_once './Student.php';
include_once '../ValidateProgram/Validate.php';

class StudentCollection extends Validate
{
    private $objects = array();
    public function createStudent()
    {
        $student = new Student;
        $student->readData();
        array_push($this->objects, $student);
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
        $id = readLine("Enter Id : ");
        $flag = false;
        foreach ($this->objects as $key => $obj) {
            $currentObject = $obj;
            if ($currentObject->checkId($id)) {
                unset($this->objects[$key]);
                $flag = true;
                echo "Records Deleted \n\n";
                self::showAllStudent();
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
                $currentObject->name = parent::validateInput(parent::extractString(readLine("Enter Name : ")), 'string');
                $currentObject->address =  parent::validateInput(readLine("Enter Address : "), 'string');
                $flag = true;
                parent::echoit("Record Updated!!!");
                self::showAllStudent();
            }
        }
        if ($flag === false) {
            echo "Record Not Found!!! \n\n";
        }
    }
}
