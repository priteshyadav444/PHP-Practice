<?php

function addit()
{
    define('SOMEVAR', "DUMMPY");
}

addit();


echo SOMEVAR;
?>
<?php
// $assocArray = array('One' => 'Cat', 'Two' => 'Dog', 'Three' =>'Elephant', 'Four' => 'Fox');
// foreach ($assocArray as $key => $value) {
// echo $key . ' : ' . $value."<br>";
// }
?>
<?php
// function isPrime($no)
// {
//     if ($no == 1)
//         return 0;

//     for ($i = 2; $i <= $no / 2; $i++) {
//         if ($no % $i == 0)
//             return 0;
//     }
//     return 1;
// }

// function printPrime($no){
//     for ($i=1; $i <= $no; $i++) { 
//         if(isPrime($i)){
//             echo $i . " ";
//         }
//     }
// }

// printPrime(100);
?>
<?php
// function recursion($a)
// {
//     if ($a < 20) {
//         echo "$a\n";
//         recursion($a + 1);
//     }
// }
// recursion(1);
?>
<?php
#Write a PHP Calculator class which will accept two values as arguments, then add them, subtract them, multiply them together, or divide them on request.
// namespace calc;
// class Calculator
// {
//     protected $num1;
//     protected $num2;
//     public function __construct(int $num1, int $num2)
//     {
//         $this->num1 = $num1;
//         $this->num2 = $num2;
//     }

//     public function add()
//     {
//         return $this->num1 + $this->num2;
//     }

//     public function substraction()
//     {
//         return $this->num1 - $this->num2;
//     }

//     public function multiply()
//     {
//         return $this->num1 * $this->num2;
//     }

//     public function divide()
//     {
//         return $this->num1 / $this->num2;
//     }
// }

// $calulator = new Calculator(12, 6);
// echo "<pre>";
// echo $calulator->add()."</br>";
// echo $calulator->substraction()."</br>";
// echo $calulator->multiply()."</br>";
// echo $calulator->divide()."</br>";

?>
<?php
// $startDate = '12-08-2004';
// print_r(DateTime::createFromFormat('m-d-Y',$startDate)->format("Y-m-d"));
?>
<?php
# Calculate the difference between two dates using PHP OOP approach

// use Illuminate\Support\Facades\Date;

// class DateOpearation
// {
//     protected $startDate;
//     protected $endDate;
//     public function __construct($startDate, $endDate){
//         $this->startDate = $startDate;
//         $this->endDate = $endDate;
//     }

//     public function dateDiffrence(){
//         $this->startDate = new DateTime($this->startDate);
//         $this->endDate = new DateTime($this->endDate);
//         $result = date_diff($this->startDate , $this->endDate);
//         $message = "Difference : {$result->y} years, {$result->m} months, {$result->d} days";
//         return $message;
//     }
// }
// $dateOperation = new DateOpearation("1999-11-03", "2013-09-04");
// echo '<pre>';
// print_r($dateOperation->dateDiffrence());
?>
<?php
# Write a PHP class that sorts an ordered integer array with the help of sort() function
// class ArrayOperation
// {
//     protected $unsortedArray;
//     public function __construct(array $unsortedArray)
//     {
//         if (!is_array($unsortedArray)) {
//             throw new InvalidArgumentException("not a number");
//         } 
//         $this->unsortedArray = $unsortedArray;
//     }
//     public function sortArray()
//     {
//         $sorted = $this->unsortedArray;
//         sort($sorted);
//         return $sorted;
//     }
// }
// $unsortedArray = array(11, -2, 4, 35, 0, 8, -9);
// $arrayOperation = new ArrayOperation($unsortedArray);
// echo "<pre>";
// print_r($arrayOperation->sortArray());
?>
<?php
# Write a PHP class that calculates the factorial of an integer.
// class Factorial
// {
//     public $number;
//     public function __construct($number)
//     {
//         if(!is_int($number)){
//             throw new InvalidArgumentException("not a number");
//         }
//         $this->number = $number;
//     }

//     public function result()
//     {
//         $factorial = 1;
//         for($i=1; $i<=$this->number; $i++)
//         {
//             $factorial *= $i;
//         }
//         return $factorial;
//     }
// }
// $newFactorial = new Factorial(6);
// echo $newFactorial->result();

?>
<?php
// class Base
// {
//     public function __construct($name)
//     {
//         echo "Hello All, I am $name";
//     }
// }
// new Base("Scott");
?>
<?php
// class Base
// {
//     public function __construct()
//     {
//         echo "'MyClass class has initialized !'";
//     }
// }
// new Base();
?>
<?php

// class Base
// {
//     public $name = "Base";
//     public function foo(int $a = 5) {
//         echo "Valid\n";
//     }
// }

// class Extend extends Base
// {
//     public $name = "Extend";
//     function foo(int $k = 1)
//     {
//         parent::foo(1);
//     }
// }
// $obj = new Extend();
// echo $obj->name;
?>
