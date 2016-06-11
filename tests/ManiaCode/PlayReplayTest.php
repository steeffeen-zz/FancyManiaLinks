<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\PlayReplay;

class PlayReplayTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $playReplay = new PlayReplay("new-name", "new-url");

        $this->assertNotNull($playReplay);
        $this->assertEquals($playReplay->getName(), "new-name");
        $this->assertEquals($playReplay->getUrl(), "new-url");
    }

    public function testName()
    {
        $playReplay = new PlayReplay();

        $this->assertNull($playReplay->getName());

        $this->assertSame($playReplay->setName("test-name"), $playReplay);

        $this->assertEquals($playReplay->getName(), "test-name");
    }

    public function testUrl()
    {
        $playReplay = new PlayReplay();

        $this->assertNull($playReplay->getUrl());

        $this->assertSame($playReplay->setUrl("test-url"), $playReplay);

        $this->assertEquals($playReplay->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $playReplay  = new PlayReplay("some-name", "some-url");

        $domElement = $playReplay->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<play_replay><name>some-name</name><url>some-url</url></play_replay>
");
    }

}
