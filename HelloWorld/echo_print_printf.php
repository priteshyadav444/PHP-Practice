<?php
$content = "World";
echo "hallo, {$content}"; // brackets
echo "hello, ${content} </br>"; // under brackets
echo "Hello", $content, "</br>"; // Parameter
echo "Hello," . $content; // Concatination

echo "<br> ------Print----";


print("hallo, {$content}"); // brackets
print("hello, ${content} </br>"); // under brackets
// print("Hello", $content, "</br>"); // Parameter
print("Hello," . $content); // Concatination


    $num = 120;
    $arr=[1,12];
    printf("formatted is %c %f",$arr[0],$arr[1]);
 
    $ans = sprintf("%.2f",$num);
    echo $ans;

?>