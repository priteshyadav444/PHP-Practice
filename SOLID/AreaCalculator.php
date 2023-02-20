<?php

namespace SOLID;

use SOLID\Circle;
use SOLID\Square;
use SOLID\SumCalculatorOutputter;

include 'Circle.php';
include 'Square.php';
include 'SumCalculatorOutputter.php';

class AreaCalculator
{
    protected $shapes;

    public function __construct($shapes = [])
    {
        $this->shapes = $shapes;
    }

    public function sum()
    {
        $area = [];
        foreach ($this->shapes as $shape) {
            if (is_a($shape, 'ShapeInterface')) {
                $area[] = $shape->area();
                continue;
            }

            // throw new AreaCalculatorInvalidShapeException();
        }

        return array_sum($area);
    }

    public function output()
    {
        return implode('', [
            '',
            'Sum of the areas of provided shapes: ',
            $this->sum(),
            '',
        ]);
    }
}


$shapes = [
    new Circle(2),
    new Square(5),
    new Square(6),
];

$areas = new AreaCalculator($shapes);
$output = new SumCalculatorOutputter($areas);

echo $output->JSON();
echo $output->HTML();
