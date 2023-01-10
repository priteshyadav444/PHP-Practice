<?php
define("ASCII_ARR",range(48,57));
    class Number{
        public $input;
        static $flag = 0;
        public function __construct($input){
            $this->input = $input;
        }

        public function extractInteger(){
            $len = strlen($this->input);
            for($i = 0; $i < $len; $i++){
                var_dump(ASCII_ARR);
                if(isset($this->input[$i]) && !in_array(ord($this->input[$i]),ASCII_ARR)){
                    // echo ord($this->input[$i]);
                    //echo $this->input[$i];
                    $this->input = str_replace($this->input[$i],'_',$this->input);
                    // echo $this->input." ";
                }
                // else{
                //     echo ord($this->input[$i]);
                // }
            }
            echo "\n".$this->input;
            // print_r(ASCII_ARR);
        }
    }

    $obj = new Number(readline("Enter :- "));
    $obj->extractInteger();
