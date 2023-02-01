<?php

namespace ValidateClass;

include 'Helper/pincode/pincode.php';
/**
 * ObjectFormatter
 */
class ObjectFormatter
{
    public function format(array $data = [], int $code = 200, string $statuscode = "SUCCESS")
    {
        $keys = array('statuscode', 'code', 'data');
        $values = array($statuscode, $code, $data);

        return json_encode(array_combine($keys, $values));
    }
}

/**
 * ErrorHandler
 */
class ErrorHandler extends ObjectFormatter
{
    /**
     * errors
     *
     * @var array
     */
    private $errors = array();

    /**
     * setError for particular key in
     *
     * @param  mixed $newError : Error Message 
     * @param  mixed $key : p
     * @return void
     */
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

    /**
     * return array of all errors
     *
     * @return array
     */
    public function all(): array
    {
        $allErrors = array();
        foreach ($this->errors as $keyError) {
            foreach ($keyError as $error)
                array_push($allErrors, $error); {
            }
        }
        return $allErrors;
    }
    /**
     * return if errors present for all keys as well as particular key
     *
     * @param  mixed $key : to check for partucular key is errors present or not
     * @return bool
     */
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

    /**
     * errorHandler : display error message as per mapped Error code
     *
     * @param  mixed $errorCode : error Code of Error Message
     * @param  mixed $dataTypes
     * @param  mixed $key
     * @param  mixed $return
     * @param  mixed $meta
     * @return string Error Message
     */
    public function errorHandler($errorCode, $dataTypes = null, $key = "", $return = false, $meta = null)
    {
        $errorMessage = match ($errorCode) {
            'INVALID_DATATYPE' => "Enter Valid Data Expected $dataTypes",
            'INVALID_DATATYPE_INT' => "$key must be $dataTypes",
            'INVALID_DATATYPE_STRING' => "$key must be $dataTypes",
            'INVALID_DATATYPE_DECIMAL' => "$key must be $dataTypes",
            'INVALID_DATATYPE_EMAIL' => "$key must be $dataTypes",
            'INVALID_OPTION' => 'Enter option is In Valid',
            'NO_DATA_FOUND' => 'No Record Found!!',
            'DATABASE_EMPTY' => 'Dataset is Empty!!!!',
            'FIELD_REQUIRED' => "$key field required",
            'MINIMUM_LENGTH_REQUIRED' => "$key minimum length is $meta",
            'MAXIMUM_LENGTH_REQUIRED' => "$key maximum length is $meta",
            'INVALID_PASSWORD_FORMAT' => "invalid password format </li>
             <li> password required eight characters,</li>
             <li> password Required at least one uppercase letter </li> 
             <li> password Required one lowercase letter</li>
             <li> password required one number </li>
             <li> password required one special character",
            'PASSWORD_MISMATCH' => "password mismatch",
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
    /**
     * getErrorMessage : return Array Message 
     *
     * @param  mixed $validationType
     * @param  mixed $key
     * @param  mixed $dataTypes
     * @param  mixed $meta : Extra information helper in error message
     * @return void
     */
    public function getErrorMessage($validationType, $key, $dataTypes = null, $meta = null)
    {
        $errorCode = match ($validationType) {
            'CHECK_DATA_INT' => 'INVALID_DATATYPE_INT',
            'CHECK_DATA_STRING' => 'INVALID_DATATYPE_STRING',
            'CHECK_DATA_DECIMAL', 'INVALID_DATATYPE_DECIMAL',
            'CHECK_DATA_EMAIL' => 'INVALID_DATATYPE_EMAIL',
            'FIELD_REQUIRED' => 'FIELD_REQUIRED',
            'CHECK_MINIMUM' => 'MINIMUM_LENGTH_REQUIRED',
            'CHECK_MAXIMUM' => 'MAXIMUM_LENGTH_REQUIRED',
            'CHECK_PASSWORD' => 'INVALID_PASSWORD_FORMAT',
            'CHECK_CONFORM_PASSWORD' => 'PASSWORD_MISMATCH',
            default => "UNEXPECTED_VALIDATION_CODE"
        };
        return $this->errorHandler($errorCode, $dataTypes, $key, true, $meta);
    }
    // display error message with expected Data Types 
    // @params: $dataTypes : pass datatypes that  expected 
    // @return type : void
    private static function __displayError($message, $dataTypes = null)
    {
        $message = $dataTypes == null ? $message : $message . " Expected ($dataTypes)";
        self::echoit($message);
    }
    /**
     * echoit : Custom echo 
     *
     * @param  mixed $msg
     * @param  mixed $newLine
     * @return void
     */
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

/**
 * Validate
 */
class Validate extends ErrorHandler
{
    /**
     * isInt : Validate input is int or not 
     *
     * @param  mixed $input
     * @return bool
     */
    public static function isInt($input): bool
    {
        $intValue = intval($input);
        return ($input == $intValue);
    }
    /**
     * isfloat : Validate input is flaot or not 
     *
     * @param  mixed $input
     * @return bool {@see isInt()}
     * @link https://taskeasy.in
     */
    public static function isfloat($input): bool
    {
        $floatval = (float)$input;
        if (strpos($input, '.') == false)
            if (self::isInt($input)) return false;
        return ($floatval == $input);
    }
    /**
     * isString : Validate input is string or not 
     *
     * @param  mixed $input
     * @return bool
     */
    public static function isString($input): bool
    {
        if (strlen($input) == 0) return false;
        if (Validate::isInt($input)) return false;
        return (preg_match("/^[a-zA-Z]{3,}( {1,2}[a-zA-Z]{3,}){0,}$/", $input) == 1);
    }
    /**
     * isEmail : Validate wetaher $input is email or not
     *
     * @param  mixed $input
     * @return bool
     */
    public static function isEmail($input): bool
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) return false;
        return true;
    }
    /**
     * getInt :  Return integer, float or bool when invalid data 
     *
     * @param  mixed $input
     * @return int | float | bool
     */
    public static function getInt($input): int | float | bool
    {
        if (self::isInt($input)) {
            return intval($input);
        } elseif (self::isfloat($input)) {
            return floatval($input);
        }
        return false;
    }
    /**
     * getString : Return string value or boolen (false) when invalid data
     *
     * @param  mixed $input
     * @return string | bool
     */
    public static function getString($input): string | bool
    {
        if (self::isString($input) && !empty($input) && !self::isInt($input)) {
            $stringValue = (string)($input);
            return $stringValue;
        }
        return false;
    }
    /**
     * getLength : get length of length
     *
     * @param  mixed $input
     * @return void
     */
    public static function getLength($input)
    {
        if (empty($input)) return 0;
        return strlen($input);
    }
    /**
     * checkMinimum : Check minimum length of $input 
     *
     * @param  mixed $input
     * @param  mixed $length
     * @return bool
     */
    public static function checkMinimum($input, $length): bool
    {
        return (self::getLength($input) >= $length);
    }
    /**
     * checkMaximum : check maximum length
     *
     * @param  mixed $input
     * @param  mixed $length
     * @return bool
     */
    public static function checkMaximum($input, $length): bool
    {
        return (self::getLength($input) <= $length);
    }
    /**
     * checkPassword : validate $input as per passed regex
     *
     * @param  mixed $input
     * @return bool
     */
    public static function checkPassword($input): bool
    {
        if (strlen($input) == 0) return false;
        return (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $input) == 1);
    }
    /**
     * extractInteger: Extract only int from the the input
     *
     * @param  mixed $input
     * @return int | float
     */
    public static function extractInteger($input): int | float
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
    /**
     * extractString : extract only string charecter from the the input
     *
     * @param  mixed $input
     * @return void
     */
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
    /**
     * handleInput : helper function of validateInput Validate pass datattypes untill data match to $dataTypes
     *
     * @param  mixed $functionName : particular function for Validateing datatypes
     * @param  mixed $input : nput data 
     * @param  mixed $dataTypes : Expected datatypes
     * @return void
     */
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
    /**
     * validateInput : validate input unless pass datatypes doest match on console application
     *
     * @param  mixed $input : passed data
     * @param  mixed $dataTypes : pass datatypes that  expected 
     * @return void
     */
    /**
     * validateInput 
     *
     * @param  mixed $input
     * @param  mixed $dataTypes
     * @return void
     */
    public function validateInput($input, $dataTypes)
    {
        if (isset($input) && $dataTypes == 'int' || $dataTypes == 'string') {
            $functionName = "get" . ucfirst($dataTypes);
            $result = self::handleInput($functionName, $input, $dataTypes);
            return $result;
        }
    }

    /**
     * echoit
     *
     * @param  mixed $msg
     * @param  mixed $newLine
     * @return void
     */
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
    /**
     * stringLower
     *
     * @param  mixed $string1
     * @return bool
     */
    public function stringLower($string1): bool
    {
        return (strtolower($string1) == $string1);
    }
    /**
     * senitizeInput
     *
     * @param  mixed $data
     * @return void
     */
    public function senitizeInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    /**
     * isEmpty
     *
     * @param  mixed $input
     * @return bool
     */
    public static function isEmpty($input): bool
    {
        return (strlen($input) == 0);
    }
    public static function checkPinCode($input)
    {
        $obj = new \IndianPincode();
        return $obj->validate($input);
    }
}
