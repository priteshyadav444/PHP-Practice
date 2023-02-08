<?php
$variable1 = "Including text blocks is easier";
$my_string = <<< EOF
    Everything is parsed in the same fashion as a double-quoted string,
    but there are advantages. $variable1; database queries and HTML output
    can benefit from this formatting.
    Once we hit a line containing nothing but the identifier, the string ends.
    EOF;
var_dump($my_string);
    /*
    string(268) "Everything is parsed in the same fashion as a double-quoted string,
    but there are advantages. Including text blocks is easier; database queries and HTML output
    can benefit from this formatting.
    Once we hit a line containing nothing but the identifier, the string ends."
    */


    $newstring = <<< EOF
        ` asd
        asd

        asda    sdfsd
        EOF;
    print_r($newstring);