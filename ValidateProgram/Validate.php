<?php

namespace ValidateClass;

class ObjectFormatter
{
    public function format(array $data = [], int $code = 200, string $statuscode = "SUCCESS")
    {
        $keys = array('statuscode', 'code', 'data');
        $values = array($statuscode, $code, $data);

        return json_encode(array_combine($keys, $values));
    }
}

class ErrorHandler extends ObjectFormatter
{
    private $errors = array();
    public function setError($newError, $key)
    {
        if (!empty($key)) {
            if (isset($this->errors[$key]) && is_array($this->errors[$key])) {
                array_push($this->errors[$key], $newError);
            } else {
                $this->errors[$key]  = array($newError);
            }
        }
    }

    public function all()
    {
        $allErrors = array();
        foreach ($this->errors as $keyError) {
            foreach ($keyError as $error)
                array_push($allErrors, $error); {
            }
        }
        return $allErrors;
    }
    // return is errors present for all as well as particular key
    public function isError($key = null): bool
    {
        if (empty($this->errors)) return false;

        if ($key == null) {
            return count($this->errors);
        } else {
            if (isset($this->errors[$key]))
                return count($this->errors[$key]);
        }
        return false;
    }
    // display error message mapped Error code
    // @params: $errorCode : error Code of Error Message
    // @return type : void
    public function errorHandler($errorCode, $dataTypes = null, $keys = "", $return = false, $meta = null)
    {
        $errorMessage = match ($errorCode) {
            'INVALID_DATATYPE' => "Enter Valid Data Expected $dataTypes",
            'INVALID_DATATYPE_INT' => "$keys must be $dataTypes",
            'INVALID_DATATYPE_STRING' => "$keys must be $dataTypes",
            'INVALID_DATATYPE_EMAIL' => "$keys must be  Valid format",
            'INVALID_OPTION' => 'Enter option is In Valid',
            'NO_DATA_FOUND' => 'No Record Found!!',
            'DATABASE_EMPTY' => 'Dataset is Empty!!!!',
            'FIELD_REQUIRED' => "$keys field required",
            'MINIMUM_LENGTH_REQUIRED' => "$keys minimum length $meta required",
            'MAXIMUM_LENGTH_REQUIRED' => "$keys maximum length $meta required",
            default => "Unexpected Validation Error",
        };
        if ($return == true) {
            return $errorMessage;
        } else {
            if ($errorCode == 'INVALID_DATATYPE' && $dataTypes != null) {
                self::__displayError($errorMessage, $dataTypes);
                return;
            }
            self::__displayError($errorMessage);
        }
    }
    public function getErrorMessage($validationType, $keys, $dataTypes = null, $meta = null)
    {
        $errorCode = match ($validationType) {
            'CHECK_DATA_INT' => 'INVALID_DATATYPE_INT',
            'CHECK_DATA_STRING' => 'INVALID_DATATYPE_STRING',
            'CHECK_DATA_EMAIL' => 'INVALID_DATATYPE_EMAIL',
            'FIELD_REQUIRED' => 'FIELD_REQUIRED',
            'CHECK_MINIMUM' => 'MINIMUM_LENGTH_REQUIRED',
            'CHECK_MAXIMUM' => 'MAXIMUM_LENGTH_REQUIRED',
            default => "UNEXPECTED_VALIDATION_CODE"
        };
        return $this->errorHandler($errorCode, $dataTypes, $keys, true, $meta);
    }
    // display error message with expected Data Types 
    // @params: $dataTypes : pass datatypes that  expected 
    // @return type : void
    private static function __displayError($message, $dataTypes = null)
    {
        $message = $dataTypes == null ? $message : $message . " Expectded ($dataTypes)";
        self::echoit($message);
    }
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

class Validate extends ErrorHandler
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
        if (strlen($input) == 0) return false;
        if (Validate::isInt($input)) return false;
        return (preg_match("/^[a-zA-Z]{3,}( {1,2}[a-zA-Z]{3,}){0,}$/", $input) == 1);
    }
    public static function isEmail($input): bool
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) return false;
        return true;
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
    public static function getLength($input)
    {
        if (empty($input)) return 0;
        return strlen($input);
    }
    public static function checkMinimum($input, $length): bool
    {
        return (self::getLength($input) >= $length);
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

    // extract only string charecter from the the input
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
                // ErrorHandler::__displayError($dataTypes);
                ErrorHandler::errorHandler('INVALID_DATATYPE', $dataTypes);
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

    // display error message o mapped Error code
    // @params: $errorCode : error Code of Error Message
    // @return type : void
    // public function errorHandler($errorCode, $dataTypes = null, $keys = "", $return = false)
    // {
    //     $errorMessage = match ($errorCode) {
    //         'INVALID_DATATYPE' => 'Enter Valid Data Expected',
    //         'INVALID_DATATYPE_INT' => "$keys Must be $dataTypes",
    //         'INVALID_DATATYPE_STRING' => "$keys Must be $dataTypes",
    //         'INVALID_OPTION' => 'Enter option is In Valid',
    //         'NO_DATA_FOUND' => 'No Record Found!!',
    //         'DATABASE_EMPTY' => 'Dataset is Empty!!!!',
    //         'FIELD_REQUIRED' => "$keys field required",
    //         default => "Unexpected Error",
    //     };
    //     if ($return == true) {
    //         return $errorMessage;
    //     } else {
    //         if ($errorCode == 'INVALID_DATATYPE' && $dataTypes != null) {
    //             self::__displayError($errorMessage, $dataTypes);
    //             return;
    //         }
    //         self::__displayError($errorMessage);
    //     }
    // }

    // display error message with expected Data Types 
    // @params: $dataTypes : pass datatypes that  expected 
    // @return type : void
    // private function __displayError($message, $dataTypes = null)
    // {
    //     $message = $dataTypes == null ? $message : $message . " Expectded ($dataTypes)";
    //     self::echoit($message);
    // }
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
    public function stringLower($string1): bool
    {
        return (strtolower($string1) == $string1);
    }
    public function senitizeInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public static function isEmpty($input): bool
    {
        return (strlen($input) == 0);
    }
}
