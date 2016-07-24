<?php

use FML\Script\ScriptInclude;

class ScriptIncludeTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $scriptInclude = new ScriptInclude("test.file", "test.namespace");

        $this->assertNotNull($scriptInclude);
        $this->assertEquals("test.file", $scriptInclude->getFile());
        $this->assertEquals("test.namespace", $scriptInclude->getNamespace());
    }

    public function testFile()
    {
        $scriptInclude = new ScriptInclude();

        $this->assertNull($scriptInclude->getFile());

        $this->assertSame($scriptInclude, $scriptInclude->setFile("some.file"));

        $this->assertEquals("some.file", $scriptInclude->getFile());
    }

    public function testNamespace()
    {
        $scriptInclude = new ScriptInclude();

        $this->assertNull($scriptInclude->getNamespace());

        $this->assertSame($scriptInclude, $scriptInclude->setNamespace("some.namespace"));

        $this->assertEquals("some.namespace", $scriptInclude->getNamespace());
    }

    public function testToString()
    {
        $scriptInclude = new ScriptInclude("other.file", "other-namespace");

        $this->assertEquals("#Include	\"other.file\"	as other-namespace
", (string)$scriptInclude);
    }

}
