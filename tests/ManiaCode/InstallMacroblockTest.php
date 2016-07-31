<?php

use FML\ManiaCode\InstallMacroblock;

class InstallMacroblockTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installMacroblock = InstallMacroblock::create("create-name", "create-file", "create-url");

        $this->assertTrue($installMacroblock instanceof InstallMacroblock);
        $this->assertEquals("create-name", $installMacroblock->getName());
        $this->assertEquals("create-file", $installMacroblock->getFile());
        $this->assertEquals("create-url", $installMacroblock->getUrl());
    }

    public function testConstruct()
    {
        $installMacroblock = new InstallMacroblock("new-name", "new-file", "new-url");

        $this->assertEquals("new-name", $installMacroblock->getName());
        $this->assertEquals("new-file", $installMacroblock->getFile());
        $this->assertEquals("new-url", $installMacroblock->getUrl());
    }

    public function testName()
    {
        $installMacroblock = new InstallMacroblock();

        $this->assertNull($installMacroblock->getName());

        $this->assertSame($installMacroblock, $installMacroblock->setName("test-name"));

        $this->assertEquals("test-name", $installMacroblock->getName());
    }

    public function testFile()
    {
        $installMacroblock = new InstallMacroblock();

        $this->assertNull($installMacroblock->getFile());

        $this->assertSame($installMacroblock, $installMacroblock->setFile("test-file"));

        $this->assertEquals("test-file", $installMacroblock->getFile());
    }

    public function testUrl()
    {
        $installMacroblock = new InstallMacroblock();

        $this->assertNull($installMacroblock->getUrl());

        $this->assertSame($installMacroblock, $installMacroblock->setUrl("test-url"));

        $this->assertEquals("test-url", $installMacroblock->getUrl());
    }

    public function testRender()
    {
        $installMacroblock = new InstallMacroblock("some-name", "some-file", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $installMacroblock->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<install_macroblock><name>some-name</name><file>some-file</file><url>some-url</url></install_macroblock>
", $domDocument->saveXML());
    }

}
