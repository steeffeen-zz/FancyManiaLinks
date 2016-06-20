<?php

use FML\ManiaCode\InstallSkin;

class InstallSkinTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installSkin = InstallSkin::create("create-name", "create-file", "create-url");

        $this->assertTrue($installSkin instanceof InstallSkin);
        $this->assertEquals($installSkin->getName(), "create-name");
        $this->assertEquals($installSkin->getFile(), "create-file");
        $this->assertEquals($installSkin->getUrl(), "create-url");
    }

    public function testConstruct()
    {
        $installSkin = new InstallSkin("new-name", "new-file", "new-url");

        $this->assertEquals($installSkin->getName(), "new-name");
        $this->assertEquals($installSkin->getFile(), "new-file");
        $this->assertEquals($installSkin->getUrl(), "new-url");
    }

    public function testName()
    {
        $installSkin = new InstallSkin();

        $this->assertNull($installSkin->getName());

        $this->assertSame($installSkin->setName("test-name"), $installSkin);

        $this->assertEquals($installSkin->getName(), "test-name");
    }

    public function testFile()
    {
        $installSkin = new InstallSkin();

        $this->assertNull($installSkin->getFile());

        $this->assertSame($installSkin->setFile("test-file"), $installSkin);

        $this->assertEquals($installSkin->getFile(), "test-file");
    }

    public function testUrl()
    {
        $installSkin = new InstallSkin();

        $this->assertNull($installSkin->getUrl());

        $this->assertSame($installSkin->setUrl("test-url"), $installSkin);

        $this->assertEquals($installSkin->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $installSkin = new InstallSkin("some-name", "some-file", "some-url");

        $domElement = $installSkin->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<install_skin><name>some-name</name><file>some-file</file><url>some-url</url></install_skin>
");
    }

}
