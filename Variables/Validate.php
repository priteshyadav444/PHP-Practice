<?php
trait Test{
    public function test($testCases, $functionName)
    {
        foreach ($testCases as $input => $output) {
            $result = self::$functionName($input);
            if ($result == $output) {
                echo "Test Case Passed :  " . $input . " => {$result}<br>";
            } else {
                echo "Test Case Failed :  " . $input . " => {$result}, (Expected => {$output})<br>";
            }
        }
    }
}

class Validate
{
    use Test;
    public function isInt($input): bool
    {
        $intValue = intval($input);
        $result = ($input == $intValue);
        return $result;
    }
    public function isString($input): bool
    {
        return is_string($input);
    }

    public function getInt($input): int
    {
        $intValue = intval($input);
        return $intValue;
    }
    public function extractInteger($input): int | float
    {
        // if input is is already integer
        if ($input == null) return false;
        if (self::isInt($input)) return $input;
        $result = 0;
        for ($i = 0; $i < strlen($input); $i++) {
            // check for floating value
            // if (isset($input[$i]) && $input[$i] == ".")
            //     break;

            if (isset($input[$i]) && self::isInt($input[$i])) {
                $result =  $result * 10 + self::getInt($input[$i]);
            }
        }
        return $result;
    }

    public function extractString($input)
    {
        if ($input == null) return false;
        if (self::isInt($input)) return false;

        $result = "";
        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];
            if (!self::isInt($char) && self::isString($char) && $char!='.') {
                $result .= $input[$i];
            }
        }
        return $result;
    }
}

// $validate = new Validate();

// echo "<pre>";
// echo "<br><br>extractString() <br>";
// $testCases = array(null => 0, 123.123 => 123123, "asdasd23" => "asdaasd", "123asd" => "asd", 123.123 => "", 123 => "", "sdasdas12asdas312.123213" => 'sdasdasasdas', "sdasdas12asdas312.12a3213" => 'sdasdasasdasa');
// $validate->test($testCases, $extractString = "extractString");

// echo "<br><br>extractInteger() <br>";
// $testCases = array(null => 0, 123.123 => 123123, "asdasd23" => 23, "123asd" => 123, 123.123 => 123123, 123 => 123, "sdasdas12asdas312.123213" => 12312123213);
// $validate->test($testCases, $extractInteger = "extractInteger");





// echo "<br><br>isInt() <br>";
// var_dump($validate->isInt("asdasd23"));
// var_dump($validate->isInt("123asd"));
// var_dump($validate->isInt("123"));
// var_dump($validate->isInt(123));
// var_dump($validate->isInt("123123a213"));

// echo "<br><br>getIntStart() <br>";
// var_dump($validate->getInt("asdasd23"));
// var_dump($validate->getInt("123asd"));
// var_dump($validate->getInt("123"));
// var_dump($validate->getInt(123));
// var_dump($validate->getInt("22q11"));

// echo "<br><br>extractInteger <br>";
// var_dump($validate->extractInteger("asdasd23"));
// var_dump($validate->extractInteger("123asd"));
// var_dump($validate->extractInteger("123"));
// var_dump($validate->extractInteger(12312321));
// var_dump($validate->extractInteger(123.12321));
// var_dump($validate->extractInteger("asdasdas12asdas312.123213"));
