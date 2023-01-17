<?php
    $str = "This is TTT his TThis  a 12Pragrapha 23a ?This is TTT his TThis 
     a 12Pragrapha 23a ?This is TTT his ///TThis  
     a 12Pragrapha 23a ?This is TTT his TThis  a 12Pragrapha 23a ?";
    // $pattern = "/P/";
    // $pattern = "/[abc]/";
    $pattern = "/\//";


    echo preg_match_all($pattern, $str);