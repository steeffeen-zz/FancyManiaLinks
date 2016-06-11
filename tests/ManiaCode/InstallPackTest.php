<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\InstallPack;

class InstallPackTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $installPack = new InstallPack("new-name", "new-file", "new-url");

        $this->assertNotNull($installPack);
        $this->assertEquals($installPack->getName(), "new-name");
        $this->assertEquals($installPack->getFile(), "new-file");
        $this->assertEquals($installPack->getUrl(), "new-url");
    }

    public function testName()
    {
        $installPack = new InstallPack();

        $this->assertNull($installPack->getName());

        $this->assertSame($installPack->setName("test-name"), $installPack);

        $this->assertEquals($installPack->getName(), "test-name");
    }

    public function testFile()
    {
        $installPack = new InstallPack();

        $this->assertNull($installPack->getFile());

        $this->assertSame($installPack->setFile("test-file"), $installPack);

        $this->assertEquals($installPack->getFile(), "test-file");
    }

    public function testUrl()
    {
        $installPack = new InstallPack();

        $this->assertNull($installPack->getUrl());

        $this->assertSame($installPack->setUrl("test-url"), $installPack);

        $this->assertEquals($installPack->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $installPack = new InstallPack("some-name", "some-file", "some-url");

        $domElement = $installPack->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<install_pack><name>some-name</name><file>some-file</file><url>some-url</url></install_pack>
");
    }

}
