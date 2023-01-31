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
                $this->validateKey($key, $data[$key], $validation);
            }
        }
    }
    # iterrate though all the validation like by exploding | pipe assign
    public function validateKey($key, $value, $validations = "")
    {
        $validations = explode("|", $validations);

        foreach ($validations as $validationType) {
            $validationCode = $this->getValidationType($validationType);
            if ($validationCode != false) {
                if ($validationCode == 'CHECK_MINIMUM' || $validationCode == 'CHECK_MAXIMUM') {
                    $meta = substr($validationType, 4,);
                    $this->performValidation($key, $value, $validationCode, $meta);
                } else {
                    $this->performValidation($key, $value, $validationCode);
                }
            }
        }
    }
    private function performValidation($key, $value, $validationType, $meta = null)
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
                Validate::setError(Validate::getErrorMessage($validationType, $key, 'string'), $key);
            }
        }
        if ($validationType == "CHECK_DATA_EMAIL") {
            if (Validate::isEmail($value) == false) {
                Validate::setError(Validate::getErrorMessage($validationType, $key, 'email'), $key);
            }
        }
        if ($validationType == "CHECK_MINIMUM") {
            if (Validate::checkMinimum($value, $meta) == false) {
                Validate::setError(Validate::getErrorMessage($validationType, $key, '', $meta), $key);
            }
        }if ($validationType == "CHECK_MAXIMUM") {
            if (Validate::checkMaximum($value, $meta) == false) {
                Validate::setError(Validate::getErrorMessage($validationType, $key, '', $meta), $key);
            }
        }
    }
    // get Mapped Error Type forValidation
    private function getValidationType($input)
    {
        $minmax = substr($input, 0, 3);
        if ($minmax == "max" || $minmax == "min") {
            $input = $minmax;
        }
        $validationType = match ($input) {
            'required' => "FIELD_REQUIRED",
            'numeric' => "CHECK_DATA_INT",
            'string' => "CHECK_DATA_STRING",
            'email' => "CHECK_DATA_EMAIL",
            'min' => "CHECK_MINIMUM",
            'max' => "CHECK_MAXIMUM",
            default => false
        };
        return $validationType;
    }
}
