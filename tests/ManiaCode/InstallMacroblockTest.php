<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\InstallMacroblock;

class InstallMacroblockTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $installMacroblock = new InstallMacroblock("new-name", "new-file", "new-url");

        $this->assertNotNull($installMacroblock);
        $this->assertEquals($installMacroblock->getName(), "new-name");
        $this->assertEquals($installMacroblock->getFile(), "new-file");
        $this->assertEquals($installMacroblock->getUrl(), "new-url");
    }

    public function testName()
    {
        $installMacroblock = new InstallMacroblock();

        $this->assertNull($installMacroblock->getName());

        $this->assertSame($installMacroblock->setName("test-name"), $installMacroblock);

        $this->assertEquals($installMacroblock->getName(), "test-name");
    }

    public function testFile()
    {
        $installMacroblock = new InstallMacroblock();

        $this->assertNull($installMacroblock->getFile());

        $this->assertSame($installMacroblock->setFile("test-file"), $installMacroblock);

        $this->assertEquals($installMacroblock->getFile(), "test-file");
    }

    public function testUrl()
    {
        $installMacroblock = new InstallMacroblock();

        $this->assertNull($installMacroblock->getUrl());

        $this->assertSame($installMacroblock->setUrl("test-url"), $installMacroblock);

        $this->assertEquals($installMacroblock->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument       = new \DOMDocument();
        $installMacroblock = new InstallMacroblock("some-name", "some-file", "some-url");

        $domElement = $installMacroblock->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<install_macroblock><name>some-name</name><file>some-file</file><url>some-url</url></install_macroblock>
");
    }

}
