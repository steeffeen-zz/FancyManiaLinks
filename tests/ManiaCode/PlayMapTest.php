<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\PlayMap;

class PlayMapTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $playMap = new PlayMap("new-name", "new-url");

        $this->assertNotNull($playMap);
        $this->assertEquals($playMap->getName(), "new-name");
        $this->assertEquals($playMap->getUrl(), "new-url");
    }

    public function testName()
    {
        $playMap = new PlayMap();

        $this->assertNull($playMap->getName());

        $this->assertSame($playMap->setName("test-name"), $playMap);

        $this->assertEquals($playMap->getName(), "test-name");
    }

    public function testUrl()
    {
        $playMap = new PlayMap();

        $this->assertNull($playMap->getUrl());

        $this->assertSame($playMap->setUrl("test-url"), $playMap);

        $this->assertEquals($playMap->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $playMap     = new PlayMap("some-name", "some-url");

        $domElement = $playMap->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<play_map><name>some-name</name><url>some-url</url></play_map>
");
    }

}
