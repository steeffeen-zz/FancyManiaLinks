<?php

use FML\ManiaCode\InstallMap;

class InstallMapTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installMap = InstallMap::create("create-name", "create-url");

        $this->assertTrue($installMap instanceof InstallMap);
        $this->assertEquals("create-name", $installMap->getName());
        $this->assertEquals("create-url", $installMap->getUrl());
    }

    public function testConstruct()
    {
        $installMap = new InstallMap("new-name", "new-url");

        $this->assertEquals("new-name", $installMap->getName());
        $this->assertEquals("new-url", $installMap->getUrl());
    }

    public function testName()
    {
        $installMap = new InstallMap();

        $this->assertNull($installMap->getName());

        $this->assertSame($installMap, $installMap->setName("test-name"));

        $this->assertEquals("test-name", $installMap->getName());
    }

    public function testUrl()
    {
        $installMap = new InstallMap();

        $this->assertNull($installMap->getUrl());

        $this->assertSame($installMap, $installMap->setUrl("test-url"));

        $this->assertEquals("test-url", $installMap->getUrl());
    }

    public function testRender()
    {
        $installMap = new InstallMap("some-name", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $installMap->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<install_map><name>some-name</name><url>some-url</url></install_map>
", $domDocument->saveXML());
    }

}
