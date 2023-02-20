<?php

namespace SOLID;

class Circle implements ShapeInterface
{
    public $radius;

    public function construct($radius)
    {
        $this->radius = $radius;
    }
    public function area()
    {
        return pi() * pow($this->radius, 2);
    }
}
