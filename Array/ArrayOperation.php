<?php

class ArrayOperation
{
    private $inputArray = array();

    function __construct($array = null)
    {
        $this->inputArray = $array;
    }
    public function getValueByIndex($index)
    {
        if (empty($this->inputArray[$index])) {
            return null;
        }
        return $this->inputArray[$index];
    }
    public function arrayLength($array)
    {
        return count($array);
    }
    public function addValue($element = null)
    {
        // if input element consist key=>value
        if (($element instanceof Element)) {
            if ($element->key != "")
                $this->inputArray[$element->key] = $element->value;
        } else if (isset($element)) {   // for value only
            $this->inputArray[] = $element;
        }
    }
    public function addValueAtStart($element = null)
    {
        // if input element consist key=>value
        if (($element instanceof Element)) {
            if ($element->key != "")
                $this->inputArray[$element->key] = $element->value;
        } else if (isset($element)) {  // for value only
            array_unshift($this->inputArray, $element);
        }
    }
    public function showArray(...$array)
    {
        // if function called using objects
        if (count($array) == 0) {
            $array = $this->inputArray;
            print_r($array);
            return;
        }
        // for passed arguemnt arbitrary no array
        for ($i = 0; $i < count($array); $i++) {
            print_r($array[$i]);
        }
    }
    // return keys only of $this->inputArray 
    public function getKeys()
    {
        if (self::arrayLength($this->inputArray) == 0) return null;
        return array_keys($this->inputArray);
    }
    // return value of $this->inputArray 
    public function getValues()
    {
        if (self::arrayLength($this->inputArray) == 0) return null;
        return array_values($this->inputArray);
    }
    // return filtered array with keys and value where value is @params $filter
    public function filterByValues($filter)
    {
        echo $filter;
        if (self::arrayLength($this->inputArray) == 0 or empty($filter)) return null;
        $filteredArray = array_filter($this->inputArray,  function ($val) use ($filter) {
            return ($val == $filter);
        });
        return $filteredArray;
    }
    // join arbitrary no of array
    public function joinArray(...$array)
    {
        return array_merge($array);
    }
}

$obj = new ArrayOperation();

// return class methods in array only public
$classmethods = get_class_methods($obj);

// return class properties in array only public
$classproperties = get_class_vars("ArrayOperation");

$obj->showArray($classmethods);
$obj->showArray($classproperties);

// $array2 = array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh', 'multi' => array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh'));
// $obj->showArray($array2);

// $arrayOpeartion = new ArrayOperation($array2);
// $arrayOpeartion->showArray();
// $arrayOpeartion->showArray($arrayOpeartion->filterByValues("pritesh"));

// $array1 = ['apples', 'grapes', 'papaya'];
// $arrayOpeartion = new ArrayOperation($array1);

// $arrayOpeartion->addValue('orange');

// $data = new Element("", "");
// $arrayOpeartion->addValue($data);
// $data = new Element("abc", "123");
// $arrayOpeartion->addValue($data);


// $arrayOpeartion->addValueAtStart('chico');

// $arrayOpeartion->addValue('chicko');
// echo $arrayOpeartion->getValueByIndex('abc');

// $array1 = ['apples', 'grapes', 'papaya'];
// $array2 = array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh');

// var_export($array1);
