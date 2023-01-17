<?php
include './Element.php';
class MultiArrayOperation
{
    public $data = array();
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
    public static $result = "";
    public function recursive($array, $element,$replace)
    {
        $flag = false;
        foreach ($array as $key => &$val) {
            if (is_array($val)) {
                $flag = self::recursive($val, $element,$replace);
                if ($flag == true) {
                    self::$result .= $key;
                    $val = $replace;
                    break;
                }
            }

            if ($val == $element) {
                self::$result .= $key;
                $val = $replace;
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
        
        $path = "";
        for ($i=0; $i < strlen(self::$result); $i++) { 
            echo self::$result[$i];
            $path = $path . "[".self::$result[$i]."]";
        }
        echo $path;
        $this->data [$path] = 123;
        // if ($flag == true)
        //     return $re

        return false;
    }
}

$arr = array('pritesh', 'nitesh', 'umasesh', 'pritesh', 'nitesh', 'umesh',  array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh'));
$obj = new MultiArrayOperation($arr);

$obj->pushArray(array('pritesh', 'nitesh', 'umesh', 'pritesh', 'nitesh', 'umesh', array('pritesh', 'pk', 'umesh', 'pritesh', 'nitesh', 'umesh', array('pritesh', 'pk', 'umesh', 'pritesh', 'nitesh',  'op'))), 4);



$obj->showArray();
echo $obj->findElement('op', 123);
echo "\n";
// $obj->showArray();

// echo $obj->findElement('op', 123);
// $obj->showArray();
