<?php
$path = "../validation/Validators/Validate.php";
include $path;
use ValidateClass\Validate;

abstract class Person extends Validate
{
    protected $name;
    protected $address;
}

class Student extends Person
{
    private $studentId;
    public $name;
    public $address;
    const IdPrefix = 'MCA';
    private static $idCounter = 1;

    public function getData()
    {
        echo "\n--------------------------------------- \n";
        echo "Student Id :" . $this->getId() . "\n";
        echo "Student Name :" . $this->getName() . "\n";
        echo "Student Address :" . $this->getAddress() . "\n";
        echo "--------------------------------------- \n\n";
    }
    private function setCustomer($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
        $this->studentId = self::makeNewId();
        self::$idCounter++;
    }
    public function makeNewId()
    {
        $id = self::getNewId();
        $newId = self::IdPrefix . $id;
        return $newId;
    }
    public  function readData()
    {
        $name = Validate::validateInput(Validate::extractString(readLine("Enter Name : ")), 'string');
        $address =  Validate::validateInput(readLine("Enter Address : "), 'string');
        $this->setCustomer($name, $address);
    }
    public function getNewId()
    {
        return self::$idCounter;
    }
    private function getId()
    {
        return $this->studentId;
    }
    private function getName()
    {
        return $this->name;
    }
    private function getAddress()
    {
        return $this->address;
    }
    public function checkId($id)
    {
        return (strtolower($id) == strtolower($this->getId()));
    }
}
