<?php
	abstract class Bank{
		protected $userid="";
		private $balance="";
		
        public function __call($name,$arg){
         if($name == 'setBankData'){
            if(count($arg)==1){
            $balance = $arg[0];
			 $this->balance = $balance;
			}
            else if(count($arg)==2){
			$userid = $arg[0];
            $balance = $arg[1];

			$this->userid = $userid;
			$this->balance = $balance;
            }
            else{}
      	}
    	}

    	public function getBalance(){
			return $this->balance;
		}

	abstract public function getCustomer();

}

	class Customer extends Bank{
		public $name="";
		public $address="";

		function __construct($userid, $name, $address){
			$this->name = $name;
			$this->address = $address;
			$balance = 0;
			$this->setBankData($userid,0);
		}

		public function getCustomer(){
			echo "User Id :".$this->userid."</br>";
			echo "User Name :".$this->name."</br>";
			echo "Balance :".$this->getBalance()."</br>";
			echo "Address :".$this->address."<br/>";
			echo "--------------------------------------- <br />";
		}	
	}

	$cust1 = new Customer(1,"Pritesh", "Vapi");

	$cust1->getCustomer();
	$cust1->setBankData(1000);
	$cust1->getcustomer();
