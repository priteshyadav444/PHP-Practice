<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

include __DIR__ . "/../program4.php";

class DataTypeTest extends TestCase
{
    function testInt()
    {
        $this->assertSame("Numeric", checkDataType("1"));
        $this->assertSame("Numeric", checkDataType("0"));
        $this->assertNotEquals("Numeric", checkDataType("0.0"));
        $this->assertSame("Numeric", checkDataType("00001"));
    }
}
