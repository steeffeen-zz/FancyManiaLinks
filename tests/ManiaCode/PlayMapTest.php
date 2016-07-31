<?php

use FML\ManiaCode\PlayMap;

class PlayMapTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $playMap = PlayMap::create("create-name", "create-url");

        $this->assertTrue($playMap instanceof PlayMap);
        $this->assertEquals("create-name", $playMap->getName());
        $this->assertEquals("create-url", $playMap->getUrl());
    }

    public function testConstruct()
    {
        $playMap = new PlayMap("new-name", "new-url");

        $this->assertEquals("new-name", $playMap->getName());
        $this->assertEquals("new-url", $playMap->getUrl());
    }

    public function testName()
    {
        $playMap = new PlayMap();

        $this->assertNull($playMap->getName());

        $this->assertSame($playMap, $playMap->setName("test-name"));

        $this->assertEquals("test-name", $playMap->getName());
    }

    public function testUrl()
    {
        $playMap = new PlayMap();

        $this->assertNull($playMap->getUrl());

        $this->assertSame($playMap, $playMap->setUrl("test-url"));

        $this->assertEquals("test-url", $playMap->getUrl());
    }

    public function testRender()
    {
        $playMap = new PlayMap("some-name", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $playMap->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<play_map><name>some-name</name><url>some-url</url></play_map>
", $domDocument->saveXML());
    }

}
