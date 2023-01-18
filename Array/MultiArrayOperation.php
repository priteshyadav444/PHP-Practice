<?php
include './Object.php';
enum SortingType
{
    case ASSOC;
    case NUMERIC;
};
class MultiArrayOperation
{
    public $data = array();
    public static $result = "";

    public function __construct($default = null)
    {
        $this->data = $default;
    }

    public function pushArray(array $inputArray, $index = null): bool
    {
        if (isset($inputArray)) {
            $index == null ? array_push($this->data, $inputArray) : $this->data[$index] = $inputArray;
            return true;
        }
        return false;
    }
    public function insertAtIndex($element, $index): bool
    {
        if (($element instanceof Element)) {
            if ($element->key != "")
                $this->data[$index][$element->key] = $element->value;
        } else if (isset($element)) {
            array_unshift($this->data, $element);
        }
        return false;
    }
    public function showArray(...$array)
    {
        echo "Size : " . count($this->data) . "\n";
        if (count($array) == 0)
            $array = $this->data;

        print_r($array);
    }
    public function recursive(&$array, $element, $replace)
    {
        $flag = false;
        foreach ($array as $key => &$value) {
            // call recurshuve function when value is array (nested array)
            if (is_array($value)) {
                $flag = self::recursive($value, $element, $replace);
                if ($flag == true) {
                    self::$result .= $key;
                    break;
                }
            }
            // replace value with $replace value it will replace actual value because refrences
            if ($value == $element) {
                $array[$key] = $replace;
                self::$result .= $key;
                $flag = true;
                break;
            }
        }

        if ($flag == true) {
            return true;
        }
        return false;
    }

    public function findElement($element, $replace)
    {
        $flag = false;
        self::$result = "";
        $flag = self::recursive($this->data, $element, $replace);
        strrev(self::$result);
        if ($flag == true)
            return self::$result;

        return false;
    }
    public function getSort($case)
    {
        $sorting = match ($case) {
            SortingType::ASSOC => 'asort',
            SortingType::NUMERIC => 'sort'
        };
        return $sorting;
    }
    public function mysort(&$inputArray, SortingType $type)
    {
        $sort = self::getSort($type);
        $sort($inputArray);
        foreach ($inputArray as &$element) {
            if (is_array($element)) {
                self::mysort($element, $type);
            }
        }
        return $inputArray;
    }

    public function inArray($array, $element)
    {
        $flag = false;
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $flag = self::inArray($value, $element);
                if ($flag == true) {
                    self::$result .= $key;
                    self::$result .= ',';
                    break;
                }
            }
            if ($value == $element) {
                self::$result .= $key;
                self::$result .= ',';
                $flag = true;
                break;
            }
        }

        if ($flag == true) {
            return true;
        }
        return false;
    }
    public function isPresent($element)
    {
        self::$result = "";
        if(self::inArray($this->data, $element)){
            $path = "";
            $pathKeys = explode(",",self::$result);
            array_reverse($pathKeys);
            var_dump($pathKeys);
            foreach($pathKeys as $value){
                $path .= $value;
                $path .= "=>";
            }
            echo "Element Position {$path} {$element}";
        }
        else{
            echo "Element is not Available";
        }
    }

}

$arr = array('pritesh', 'nitesh', 'umasesh', 'pritesh', 'nitesh', 'umesh',  array('123', 'nitesh', '312', 'pritesh', '123', 'umesh'));
$obj = new MultiArrayOperation($arr);
$obj->pushArray(array('y', 'x', 'u', 'v', 'u', array('asd', 'asddsa', 'asddsa', 'asdasdz', 'asdasd', 'asd', array('sad', 'pk', 'umesh', 'sad', 'asd', 'hh' => 'op'))), 6);



// $obj->showArray();
// $obj->mysort($obj->data, SortingType::ASSOC);
$obj->showArray();
$obj->isPresent('x');

// echo $obj->findElement('op', 123);
// array_walk($obj->data, function($element){
//     echo "Element => \n"; 
//     print_r($element);
// });
echo "\n";
// $obj->showArray();

// echo $obj->findElement('op', 123);
// $obj->showArray();
