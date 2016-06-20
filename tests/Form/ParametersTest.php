<?php

use FML\Form\Parameters;

class ParametersTest extends \PHPUnit_Framework_TestCase
{

    public function testGetValueMissing()
    {
        $this->assertNull(Parameters::getValue("test-name"));
    }

    public function testGetValueWithGET()
    {
        $this->assertEquals("test-get-value", Parameters::getValue("test-get-name"));
    }

    public function testGetValueWithPOST()
    {
        $this->assertEquals("test-post-value", Parameters::getValue("test-post-name"));
    }

}
