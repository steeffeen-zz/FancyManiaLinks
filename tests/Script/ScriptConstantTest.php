<?php

use FML\Script\ScriptConstant;

class ScriptConstantTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $scriptConstant = new ScriptConstant("test-name", "test-value");

        $this->assertNotNull($scriptConstant);
        $this->assertEquals("test-name", $scriptConstant->getName());
        $this->assertEquals("test-value", $scriptConstant->getValue());
    }

    public function testName()
    {
        $scriptConstant = new ScriptConstant();

        $this->assertNull($scriptConstant->getName());

        $this->assertSame($scriptConstant, $scriptConstant->setName("some-name"));

        $this->assertEquals("some-name", $scriptConstant->getName());
    }

    public function testValueFloat()
    {
        $scriptConstant = new ScriptConstant();

        $this->assertNull($scriptConstant->getValue());

        $this->assertSame($scriptConstant, $scriptConstant->setValue(13.37));

        $this->assertEquals(13.37, $scriptConstant->getValue());
    }

    public function testToString()
    {
        $scriptConstant = new ScriptConstant("other-name", "other-value");

        $this->assertEquals("#Const	other-name	\"other-value\"
", (string)$scriptConstant);
    }

}
