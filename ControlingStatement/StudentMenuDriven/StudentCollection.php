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
        }
        for ($i = 0; $i < count($this->objects); $i++) {
            $currentObject = $this->objects[$i];
            $currentObject->getData();
        }
    }

    public function deleteStudent()
    {
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
}
