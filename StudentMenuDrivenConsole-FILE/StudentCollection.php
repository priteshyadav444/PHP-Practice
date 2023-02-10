<?php
include_once './Student.php';
$path = "../validation/Validators/FormValidator.php";
include $path;

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
            Validate::errorHandler('NO_DATA_FOUND');
            return;
        }
        foreach ($this->objects as $key => $obj) {
            $obj->getData();
        }
    }

    public function deleteStudent()
    {
        if (count($this->objects) == 0) {
            Validate::errorHandler('DATABASE_EMPTY');
            return;
        }
        $id = readLine("Enter Id : ");
        $flag = false;
        foreach ($this->objects as $key => $obj) {
            if ($obj->checkId($id)) {
                unset($this->objects[$key]);
                $flag = true;
                parent::echoit("Records Deleted");
                self::showAllStudent();
            }
        }
        if ($flag === false) {
            parent::echoit("Record Not Found!!!", 1);
        }
    }

    public function searchStudent()
    {
        if (count($this->objects) == 0) {
            Validate::errorHandler('DATABASE_EMPTY');
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
            Validate::errorHandler('NO_DATA_FOUND');
        }
    }

    public function updateStudent()
    {
        $flag = false;
        if (count($this->objects) == 0) {
            Validate::errorHandler('DATABASE_EMPTY');
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
            Validate::errorHandler('NO_DATA_FOUND');
        }
    }
}
