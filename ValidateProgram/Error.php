<?php

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
    public function errorHandler($errorCode, $dataTypes = null, $keys = "", $return = false)
    {
        $errorMessage = match ($errorCode) {
            'INVALID_DATATYPE' => 'Enter Valid Data Expected',
            'INVALID_DATATYPE_INT' => "$keys Must be $dataTypes",
            'INVALID_DATATYPE_STRING' => "$keys Must be $dataTypes",
            'INVALID_OPTION' => 'Enter option is In Valid',
            'NO_DATA_FOUND' => 'No Record Found!!',
            'DATABASE_EMPTY' => 'Dataset is Empty!!!!',
            'FIELD_REQUIRED' => "$keys field required",
            default => "Unexpected Error",
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