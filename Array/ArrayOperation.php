ls
<?php
class Element
{
    public $key = "";
    public $value = "";
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }
}
class ArrayOperation
{
    private $inputArray = array();
    function __construct($array = null)
    {
        $this->inputArray = $array;
    }
    public function getValueByIndex($index)
    {
        if (!isset($this->inputArray[$index])) {
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
        if (($element instanceof Element)) {
            if ($element->key != "")
                $this->inputArray[$element->key] = $element->value;
        } else if (isset($element)) {
            $this->inputArray[] = $element;
        }
    }
    public function addValueAtStart($element = null)
    {
        if (($element instanceof Element)) {
            if ($element->key != "")
                $this->inputArray[$element->key] = $element->value;
        } else if (isset($element)) {
            array_unshift($this->inputArray, $element);
        }
    }
    public function showArray(...$array)
    {
        if (count($array) == 0) {
            $array = $this->inputArray;
            print_r($array);
            return;
        }

        for ($i = 0; $i < count($array); $i++) {
            print_r($array[$i]);
        }
    }
    public function getKeys()
    {
        if (self::arrayLength($this->inputArray) == 0) return null;
        return array_keys($this->inputArray);
    }
    public function getValues()
    {
        if (self::arrayLength($this->inputArray) == 0) return null;
        return array_values($this->inputArray);
    }
    public function filterByValues($filter)
    {
        echo $filter;
        if (self::arrayLength($this->inputArray) == 0 or empty($filter)) return null;
        $filteredArray = array_filter($this->inputArray,  function($val) use ($filter){
            return ($val == $filter);
        });
        return $filteredArray;
    }
    
    public function joinArray(...$array)
    {
        return array_merge($array);
    }
}

$array2 = array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh');
$arrayOpeartion = new ArrayOperation($array2);
$arrayOpeartion->showArray();
$arrayOpeartion->showArray($arrayOpeartion->filterByValues("pritesh"));





$array1 = ['apples', 'grapes', 'papaya'];
$arrayOpeartion = new ArrayOperation($array1);

$arrayOpeartion->addValue('orange');

$data = new Element("", "");
$arrayOpeartion->addValue($data);
$data = new Element("abc", "123");
$arrayOpeartion->addValue($data);


$arrayOpeartion->addValueAtStart('chico');

$arrayOpeartion->addValue('chicko');
echo $arrayOpeartion->getValueByIndex('abc');

$array1 = ['apples', 'grapes', 'papaya'];
$array2 = array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh');

var_export($array1);
