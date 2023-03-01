<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

include __DIR__ . "/../checkDataType.php";

class DataTypeTest extends TestCase
{
    function testInt()
    {
        $this->assertSame("Numeric", checkDataType("1"));
        $this->assertSame("Numeric", checkDataType("0"));
        $this->assertNotEquals("Numeric", checkDataType("0.0"));
        $this->assertSame("Numeric", checkDataType("00001"));
    }
    function testFloat()
    {
        $this->assertSame("Floating", checkDataType("1.0"));
        $this->assertSame("Floating", checkDataType("1.2323"));
        $this->assertSame("Floating", checkDataType("13333.00"));
        $this->assertSame("Floating", checkDataType("0.0"));
        $this->assertSame("Floating", checkDataType(".01231"));
        $this->assertSame("Floating", checkDataType("-103.342"));
        $this->assertSame("Floating", checkDataType("-0.0"));
        $this->assertNotEquals("Floating", checkDataType(""));
        $this->assertSame("Floating", checkDataType("00001.0"));
        $this->assertNotEquals("Floating", checkDataType("Nan"));
    }
    function testString()
    {
        $this->assertSame("String", checkDataType("pritesh"));
        $this->assertSame("String", checkDataType("Pritesh"));
        $this->assertSame("String", checkDataType("a"));
        $this->assertSame("String", checkDataType("Aa"));
        $this->assertSame("String", checkDataType("asd.0asd0"));
        $this->assertSame("String", checkDataType("asd.0'as'd0"));
        $this->assertSame("String", checkDataType("//123"));
        $this->assertNotEquals("", checkDataType("//123"));
    }
    function testNull()
    {
        $this->assertSame("Null", checkDataType("null"));
        $this->assertSame("Null", checkDataType("Null"));
        $this->assertSame("Null", checkDataType("nuLL"));
        $this->assertSame("Null", checkDataType("NuLl"));
    }
}
