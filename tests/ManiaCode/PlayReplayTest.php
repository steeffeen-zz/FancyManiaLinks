<?php

use FML\ManiaCode\PlayReplay;

class PlayReplayTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $playReplay = PlayReplay::create("create-name", "create-url");

        $this->assertTrue($playReplay instanceof PlayReplay);
        $this->assertEquals("create-name", $playReplay->getName());
        $this->assertEquals("create-url", $playReplay->getUrl());
    }

    public function testConstruct()
    {
        $playReplay = new PlayReplay("new-name", "new-url");

        $this->assertEquals("new-name", $playReplay->getName());
        $this->assertEquals("new-url", $playReplay->getUrl());
    }

    public function testName()
    {
        $playReplay = new PlayReplay();

        $this->assertNull($playReplay->getName());

        $this->assertSame($playReplay, $playReplay->setName("test-name"));

        $this->assertEquals("test-name", $playReplay->getName());
    }

    public function testUrl()
    {
        $playReplay = new PlayReplay();

        $this->assertNull($playReplay->getUrl());

        $this->assertSame($playReplay, $playReplay->setUrl("test-url"));

        $this->assertEquals("test-url", $playReplay->getUrl());
    }

    public function testRender()
    {
        $playReplay = new PlayReplay("some-name", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $playReplay->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<play_replay><name>some-name</name><url>some-url</url></play_replay>
", $domDocument->saveXML());
    }

}
