<?php
$path = "../validation/Validators/Validate.php";
include $path;
use ValidateClass\Validate;

class Student extends Validate
{
    private $studentId;
    private $name;
    private $address;
    const IdPrefix = 'MCA';
    public function __construct($id = null, $name = null, $address = null)
    {
        $this->studentId = $id;
        $this->name = $name;
        $this->address = $address;
    }
    public function getData()
    {
        echo "\n--------------------------------------- \n";
        echo "Id :". $this->getId() . "\n";
        echo "College Id :" . self::IdPrefix.$this->getId() . "\n";
        echo "Student Name :" . $this->getName() . "\n";
        echo "Student Address :" . $this->getAddress() . "\n";
        echo "--------------------------------------- \n";
    }
    private function setCustomer($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }
    public  function readData()
    {
        $name = Validate::validateInput(Validate::extractString(readLine("Enter Name : ")), 'string');
        $address =  Validate::validateInput(readLine("Enter Address : "), 'string');
        $this->setCustomer($name, $address);
    }
    public function getId()
    {
        return $this->studentId;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function checkId($id)
    {
        return (strtolower($id) == strtolower($this->getId()));
    }
}
