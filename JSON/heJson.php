<?php
$result = array('menu1' => 'home', 'menu2' => 'code php', 'menu3' => 'about');

//return the json response:
header('Content-Type: application/json'); // <-- header declaration
echo json_encode($result, true); // <--- encode
exit();
