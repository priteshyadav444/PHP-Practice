<?php

use SOLID\AreaCalculator;

class VolumeCalculator extends AreaCalculator
{
    public function construct($shapes = [])
    {
        parent::construct($shapes);
    }

    public function sum()
    {
        // logic to calculate the volumes and then return an array of output
        $summedData = 0;
        return $summedData;
    }
}
