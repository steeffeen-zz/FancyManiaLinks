<?php

use FML\ManiaCode\InstallPack;

class InstallPackTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installPack = InstallPack::create("create-name", "create-file", "create-url");

        $this->assertTrue($installPack instanceof InstallPack);
        $this->assertEquals("create-name", $installPack->getName());
        $this->assertEquals("create-file", $installPack->getFile());
        $this->assertEquals("create-url", $installPack->getUrl());
    }

    public function testConstruct()
    {
        $installPack = new InstallPack("new-name", "new-file", "new-url");

        $this->assertEquals("new-name", $installPack->getName());
        $this->assertEquals("new-file", $installPack->getFile());
        $this->assertEquals("new-url", $installPack->getUrl());
    }

    public function testName()
    {
        $installPack = new InstallPack();

        $this->assertNull($installPack->getName());

        $this->assertSame($installPack, $installPack->setName("test-name"));

        $this->assertEquals("test-name", $installPack->getName());
    }

    public function testFile()
    {
        $installPack = new InstallPack();

        $this->assertNull($installPack->getFile());

        $this->assertSame($installPack, $installPack->setFile("test-file"));

        $this->assertEquals("test-file", $installPack->getFile());
    }

    public function testUrl()
    {
        $installPack = new InstallPack();

        $this->assertNull($installPack->getUrl());

        $this->assertSame($installPack, $installPack->setUrl("test-url"));

        $this->assertEquals("test-url", $installPack->getUrl());
    }

    public function testRender()
    {
        $installPack = new InstallPack("some-name", "some-file", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $installPack->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<install_pack><name>some-name</name><file>some-file</file><url>some-url</url></install_pack>
", $domDocument->saveXML());
    }

}
