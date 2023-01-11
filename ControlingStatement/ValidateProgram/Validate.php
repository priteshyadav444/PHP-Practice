<?php
class Validate
{
    // Validate input is int or not 
    // @params: mixed
    // @return type : boolean
    public static function isInt($input): bool
    {
        $intValue = intval($input);
        return ($input == $intValue);
    }

    // Validate input is flaot or not 
    // @params: mixed
    // @return type : boolean
    public static function isfloat($input): bool
    {
        $intValue = floatval($input);
        return ($input == $intValue);
    }

    // Validate input is string or not 
    // @params: mixed
    // @return type : boolean
    public static function isString($input): bool
    {
        return is_string($input);
    }
    // Return integer, float or bool when invalid data 
    // @params: mixed
    // @return type : int | float | bool
    public static function getInt($input): int | float | bool
    {
        if (self::isInt($input)) {
            return intval($input);
        } elseif (self::isfloat($input)) {
            return floatval($input);
        }
        return false;
    }

    // Return string value or boolen (false) when invalid data
    // @params: mixed
    // @return type : string | bool
    public static function getString($input): string | bool
    {
        if (self::isString($input) && !empty($input) && !self::isInt($input)) {
            $stringValue = (string)($input);
            return $stringValue;
        }
        return false;
    }

    // Extract only int from the the input
    // @params: mixed
    // @return type : int | float
    public function extractInteger($input): int | float
    {
        // if input is is already integer
        if ($input == null) return false;
        if (self::isInt($input)) return $input;
        $result = 0;
        for ($i = 0; $i < strlen($input); $i++) {
            // Validate for floating value
            // if (isset($input[$i]) && $input[$i] == ".")
            //     break;

            if (isset($input[$i]) && self::isInt($input[$i])) {
                $result =  $result * 10 + self::getInt($input[$i]);
            }
        }
        return $result;
    }

    // extract only sting charecter from the the input
    // @params: mixed
    // @return type : string
    public function extractString($input)
    {
        if ($input == null) return false;
        if (self::isInt($input)) return false;

        $result = "";
        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];
            if (!self::isInt($char) && self::isString($char) && $char != '.') {
                $result .= $input[$i];
            }
        }
        return $result;
    }

    // helper function of validateInput Validate pass datattypes untill data match to $dataTypes
    // @params: $functionname : particular function for Validateing datatypes , $input : input data , $dataTypes : expected
    // @return type : @params : $dataTypes 
    private function handleInput($functionName, $input, $dataTypes)
    {
        $result = Validate::$functionName($input);
        do {
            if ($result === false) {
                self::__displayError($dataTypes);
                self::errorHandler('INVALID_DATATYPE', $dataTypes);
                $result = Validate::$functionName(readline("Enter Input Again :\n"));
            } else {
                break;
            }
        } while (true);
        return $result;
    }

    // validate input unless pass datatypes doest match on console application
    // @params: $input : passed data, $dataTypes : pass datatypes that  expected 
    // @return type : @params : $dataTypes
    public function validateInput($input, $dataTypes)
    {
        if (isset($input) && $dataTypes == 'int' || $dataTypes == 'string') {
            $functionName = "get" . ucfirst($dataTypes);
            $result = self::handleInput($functionName, $input, $dataTypes);
            return $result;
        }
    }

    // display error message o fmapped Error code
    // @params: $errorCode : error Code of Error Message
    // @return type : void
    public function errorHandler($errorCode, $dataTypes = null)
    {
        $errorMessage = match ($errorCode) {
            'INVALID_DATATYPE' => 'Enter Valid Data Expected',
            'INVALID_OPTION' => 'Enter option is In Valid',
            'NO_DATA_FOUND' => 'No Record Found!!',
            'DATABASE_EMPTY' => 'Dataset is Empty!!!!',
            default => "Unexpected Error",
        };

        if ($errorCode == 'INVALID_DATATYPE' && $dataTypes != null) {
            self::__displayError($errorMessage, $dataTypes);
            return;
        }
        self::__displayError($errorMessage);
    }

    // display error message with expected Data Types 
    // @params: $dataTypes : pass datatypes that  expected 
    // @return type : void
    private function __displayError($message, $dataTypes = null)
    {
        $message = $dataTypes == null ? $message : $message . " Expectded ($dataTypes)";
        self::echoit($message);
    }
    // echo with two line
    public function echoit($msg, $newLine = 2)
    {
        if ($newLine < 1) {
            echo "$msg \n";
            return;
        }

        $temp = "";
        for ($i = 1; $i <= $newLine; $i++)
            $temp .= "\n";
        echo $msg . $temp;
    }
}
