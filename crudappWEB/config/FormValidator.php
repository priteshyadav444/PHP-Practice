<?php
include "../../ValidateProgram/Validate.php";

use ValidateClass\Validate;

class FormValidator extends  Validate
{
    // iterate through all passed validation keys 
    function validate($data, $validations)
    {

        foreach ($validations as $key => $validation) {
            if (array_key_exists($key, $data));
            $this->validateInput($key, $data[$key], $validation);
        }
    }
    # iterrate though all the validation like by exploding | pipe assign
    public function validateInput($key, $value, $validations = "")
    {
        $validations = explode("|", $validations);
        foreach ($validations as $validationType) {
            $this->handleValidation($key, $value, $validationType);
        }
    }
    private function handleValidation($key, $value, $validationType)
    {
        $value = Validate::senitizeInput($value);
        $validationType = $this->getValidationType($validationType);

        if ($validationType == "FIELD_REQUIRED") {
            if ($this->isEmpty($value) == true) {
                Validate::setError(Validate::errorHandler($validationType, "", $key, true), $key);
            }
        }
        if ($validationType == "INVALID_DATATYPE_INT") {
            if (Validate::isInt($value) == false) {
                Validate::setError(Validate::errorHandler($validationType, "number", $key, true), $key);
            }
        }
        if ($validationType == "INVALID_DATATYPE_STRING") {
            if (Validate::isString($value) == false) {
                Validate::setError(Validate::errorHandler($validationType, "string", $key, true), $key);
            }
        }
    }
    // get Mapped Error Type forValidation
    private function getValidationType($input)
    {
        $validationType = match ($input) {
            'required' => "FIELD_REQUIRED",
            'numeric' => "INVALID_DATATYPE_INT",
            'string' => "INVALID_DATATYPE_STRING",
        };
        return $validationType;
    }
}
