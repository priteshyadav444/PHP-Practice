<?php
echo "<pre>";
$amount = 12;
$total = $amount + 21.12;
echo $total."<br>";

$var1 = "12";
$var2 = 12;

var_dump($var1==$var2);
// if($name==$name1){
//     echo "<br> Avinesh";
// }

echo $var1."<br>";

function newfunction (&$var1=null) {
    $var1 = 123;
    echo $var1 . "<br>";
};

newfunction($var1);
echo $var1."<br>";

?>

