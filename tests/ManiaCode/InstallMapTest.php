<?php

use FML\ManiaCode\InstallMap;

class InstallMapTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installMap = InstallMap::create("create-name", "create-url");

        $this->assertTrue($installMap instanceof InstallMap);
        $this->assertEquals($installMap->getName(), "create-name");
        $this->assertEquals($installMap->getUrl(), "create-url");
    }

    public function testConstruct()
    {
        $installMap = new InstallMap("new-name", "new-url");

        $this->assertEquals($installMap->getName(), "new-name");
        $this->assertEquals($installMap->getUrl(), "new-url");
    }

    public function testName()
    {
        $installMap = new InstallMap();

        $this->assertNull($installMap->getName());

        $this->assertSame($installMap->setName("test-name"), $installMap);

        $this->assertEquals($installMap->getName(), "test-name");
    }

    public function testUrl()
    {
        $installMap = new InstallMap();

        $this->assertNull($installMap->getUrl());

        $this->assertSame($installMap->setUrl("test-url"), $installMap);

        $this->assertEquals($installMap->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $installMap  = new InstallMap("some-name", "some-url");

        $domElement = $installMap->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<install_map><name>some-name</name><url>some-url</url></install_map>
");
    }

}
