<?php
interface BankOperation
{
    public function getBalance();
    public function getCustomer();
    // public function setCustomer($userid);
}
class Bank implements BankOperation
{
    protected $userid = "";
    public $name = "";
    private $balance;

    public function __call($name, $arg)
    {
        if ($name == 'setCustomer') {
            if (count($arg) == 1) {
                $userid = $arg[0];
                $this->userid = $userid;
            } else if (count($arg) == 2) {
                $userid = $arg[0];
                $name = $arg[1];

                $this->userid = $userid;
                $this->name = $name;
            } else if (count($arg) == 3) {
                $userid = $arg[0];
                $name = $arg[1];
                $balance = $arg[2];

                $this->userid = $userid;
                $this->name = $name;
                $this->balance = $balance;
            } else {
            }
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }
    protected function setBalance($balance)
    {
        $this->balance = $balance;
    }
    public function getCustomer()
    {
        echo "User Id :" . $this->userid . "</br>";
        echo "User Name :" . $this->name . "</br>";
        echo "Balance :" . $this->getBalance() . "</br>";
        echo "--------------------------------------- <br />";
    }
}

class Customer extends Bank
{

    public $address = "";

    function __construct($userid = null, $name = null, $address = null, $balance = null)
    {
        parent::setCustomer($userid, $name, $balance);
        //parent::setBalance($balance);
        $this->address = $address;
    }

    public function getCustomer()
    {
        echo "User Id :" . $this->userid . "</br>";
        echo "User Name :" . $this->name . "</br>";
        echo "Balance :" . $this->getBalance() . "</br>";
        echo "Address :" . $this->address . "<br/>";
        echo "--------------------------------------- <br />";
    }
}

$cust1 = new Customer(1, "Pritesh", "Vapi", 1000);
$cust1->getCustomer();
$cust1->setCustomer(2);
$cust1->getCustomer();

$cust12 = new Customer();
$cust12->getCustomer();


include './Practice/practice.php';
// use \calc as CC;
// $calc = new CC\Calculator(95,45);
