<?php

use FML\ManiaCode\InstallSkin;

class InstallSkinTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installSkin = InstallSkin::create("create-name", "create-file", "create-url");

        $this->assertTrue($installSkin instanceof InstallSkin);
        $this->assertEquals("create-name", $installSkin->getName());
        $this->assertEquals("create-file", $installSkin->getFile());
        $this->assertEquals("create-url", $installSkin->getUrl());
    }

    public function testConstruct()
    {
        $installSkin = new InstallSkin("new-name", "new-file", "new-url");

        $this->assertEquals("new-name", $installSkin->getName());
        $this->assertEquals("new-file", $installSkin->getFile());
        $this->assertEquals("new-url", $installSkin->getUrl());
    }

    public function testName()
    {
        $installSkin = new InstallSkin();

        $this->assertNull($installSkin->getName());

        $this->assertSame($installSkin, $installSkin->setName("test-name"));

        $this->assertEquals("test-name", $installSkin->getName());
    }

    public function testFile()
    {
        $installSkin = new InstallSkin();

        $this->assertNull($installSkin->getFile());

        $this->assertSame($installSkin, $installSkin->setFile("test-file"));

        $this->assertEquals("test-file", $installSkin->getFile());
    }

    public function testUrl()
    {
        $installSkin = new InstallSkin();

        $this->assertNull($installSkin->getUrl());

        $this->assertSame($installSkin, $installSkin->setUrl("test-url"));

        $this->assertEquals("test-url", $installSkin->getUrl());
    }

    public function testRender()
    {
        $installSkin = new InstallSkin("some-name", "some-file", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $installSkin->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<install_skin><name>some-name</name><file>some-file</file><url>some-url</url></install_skin>
", $domDocument->saveXML());
    }

}
