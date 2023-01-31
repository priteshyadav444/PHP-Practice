<?php
include "../../ValidateProgram/Validate.php";

use ValidateClass\Validate;

class FormValidator extends  Validate
{
    // iterate through all passed validation keys 
    function validate(&$data, $validations)
    {
        foreach ($validations as $key => $validation) {
            if (array_key_exists($key, $data)); {
                $data[$key] = Validate::senitizeInput($data[$key]);
                $this->validateInput($key, $data[$key], $validation);
            }
        }
    }
    # iterrate though all the validation like by exploding | pipe assign
    public function validateInput($key, $value, $validations = "")
    {
        $validations = explode("|", $validations);
        foreach ($validations as $validationType) {
            $validationType = $this->getValidationType($validationType);

            if ($validationType != false) {
                $this->handleValidation($key, $value, $validationType);
            }
        }
    }
    private function handleValidation($key, $value, $validationType)
    {

        if ($validationType == "FIELD_REQUIRED") {
            if ($this->isEmpty($value) == true) {
                Validate::setError(Validate::getErrorMessage($validationType, $key), $key);
            }
        }
        if ($validationType == "CHECK_DATA_INT") {
            if (Validate::isInt($value) == false) {
                Validate::setError(Validate::getErrorMessage($validationType, $key, "number"), $key);
            }
        }
        if ($validationType == "CHECK_DATA_STRING") {
            if (Validate::isString($value) == false) {
                Validate::setError(Validate::getErrorMessage($validationType, $key, 'String'), $key);
            }
        }
    }
    // get Mapped Error Type forValidation
    private function getValidationType($input)
    {
        $validationType = match ($input) {
            'required' => "FIELD_REQUIRED",
            'numeric' => "CHECK_DATA_INT",
            'string' => "CHECK_DATA_STRING",
            'email' => "CHECK_DATA_EMIAL",
            default => false
        };
        return $validationType;
    }
}
