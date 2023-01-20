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
    public function getSortType($case)
    {
        $sorting = match ($case) {
            SortingType::ASSOC => 'asort',
            SortingType::NUMERIC => 'sort'
        };
        return $sorting;
    }
    public function mySort(&$inputArray, SortingType $type)
    {
        $sort = self::getSortType($type);
        $sort($inputArray);
        foreach ($inputArray as &$element) {
            if (is_array($element)) {
                self::mySort($element, $type);
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
        if (self::inArray($this->data, $element)) {
            $path = "";
            $pathKeys = explode(",", self::$result);
            array_reverse($pathKeys);
            var_dump($pathKeys);
            foreach ($pathKeys as $value) {
                var_dump($value);
                if (!empty($value)) {
                    $path .= $value;
                    $path .= "=>";
                }
            }
            echo "Element Position {$path} {$element}";
        } else {
            echo "Element is not Available";
        }
    }
    private function unsetDublicate(&$inputArray, &$mapArray)
    {
        foreach ($inputArray as $key => &$value) {
            if (is_array($value)) {
                self::unsetDublicate($value, $mapArray);
            } else {
                if (!empty($mapArray[$value])) {
                    unset($inputArray[$key]);
                } else {
                    if (empty($mapArray[$value])) {
                        $mapArray[$value] = 1;
                    } else {
                        $mapArray[$value]++;
                    }
                }
            }
        }
    }
    public function removeDublicate()
    {
        $mapArray = array();
        self::unsetDublicate($this->data, $mapArray);
        return true;
    }
    // set $result variable with value count in array. where key is distict value and its as value.
    public function recursiveCountValues($inputArray)
    {
        foreach ($inputArray as $key => $val) {
            if (is_array($val)) {
                self::recursiveCountValues($val);
            } else {
                if (empty(self::$result[$val])) {
                    self::$result[$val] = 1;
                } else {
                    self::$result[$val] = self::$result[$val] + 1;
                }
            }
        }
    }

    public function countValues()
    {
        self::$result = array();
        self::recursiveCountValues($this->data, self::$result);
        return self::$result;
    }
}

$arr = array('pritesh', 'nitesh', 'umasesh', 'pritesh', 'nitesh', 'umesh',  array('123', 'nitesh', '312', 'pritesh', '123', 'umesh'));
$obj = new MultiArrayOperation($arr);
$obj->pushArray(array('y', 'x', 'u', 'v', 'u', array('asd', 'asddsa', 'asddsa', 'asdasdz', 'asdasd', 'asd', array('sad', 'pk', 'umesh', 'sad', 'asd', 'hh' => 'op', 'pritesh'))), 6);


// $obj->showArray();
// $obj->removeDublicate();

$obj->showArray();
echo "Count Array \n";
// print_r($obj->countValues($obj->data));
echo "\n";

print_r(json_encode($obj->data));