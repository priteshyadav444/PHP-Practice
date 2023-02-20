<?php

namespace SOLID;

interface ShapeInterface
{
    public function area();
}
interface ThreeDimensionalShapeInterface
{
    public function volume();
}
interface ManageShapeInterface
{
    public function calculate();
}
