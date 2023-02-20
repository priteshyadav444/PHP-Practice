<?php

namespace SOLID;

class Square implements ShapeInterface
{
    public $length;

    public function construct($length)
    {
        $this->length = $length;
    }
    public function area()
    {
        return pow($this->length, 2);
    }
}
