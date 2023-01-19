<?php
// $height = readline("Enter Height :");
// for ($i = 0; $i < $height; $i++) {
//     $start = 65;
//     $width = (2 * $i + 1);
//     for ($j = 1; $j <= $width; $j++) {
//         if ($j <= $width / 2) {
//             echo chr($start++);
//         } else {
//             echo chr($start--);
//         }
//     }
//     echo "\n";
// }



$alpha = range('A', 'Z');  
for ($i=5; $i>=1; $i--) {    
  for($j=0; $j<=$i; $j++) {    
     echo ' ';    
  }  
  $j--;  
for ($k=0; $k<=(5-$j); $k++) {    
    echo $alpha[$k];   
}    
echo "\n";  
}
