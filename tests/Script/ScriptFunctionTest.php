<?php

use FML\Script\ScriptFunction;

class ScriptFunctionTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $scriptFunction = new ScriptFunction("test-name", "test-text");

        $this->assertNotNull($scriptFunction);
        $this->assertEquals("test-name", $scriptFunction->getName());
        $this->assertEquals("test-text", $scriptFunction->getText());
    }

    public function testName()
    {
        $scriptFunction = new ScriptFunction();

        $this->assertNull($scriptFunction->getName());

        $this->assertSame($scriptFunction, $scriptFunction->setName("some-name"));

        $this->assertEquals("some-name", $scriptFunction->getName());
    }

    public function testText()
    {
        $scriptFunction = new ScriptFunction();

        $this->assertNull($scriptFunction->getText());

        $this->assertSame($scriptFunction, $scriptFunction->setText("some-text"));

        $this->assertEquals("some-text", $scriptFunction->getText());
    }

    public function testToString()
    {
        $scriptFunction = new ScriptFunction("other-name", "other-value");

        $this->assertEquals("other-value", (string)$scriptFunction);
    }

}
