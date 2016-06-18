<?php

use FML\Controls\Audio;

class AudioTest extends \PHPUnit_Framework_TestCase
{

    public function testTagName()
    {
        $audio = new Audio();

        $tagName = $audio->getTagName();

        $this->assertEquals("audio", $tagName);
    }

    public function testManiaScriptClass()
    {
        $audio = new Audio();

        $maniaScriptClass = $audio->getManiaScriptClass();

        $this->assertEquals("CMlMediaPlayer", $maniaScriptClass);
    }

    public function testData()
    {
        $audio = new Audio();

        $this->assertNull($audio->getData());

        $this->assertSame($audio, $audio->setData("data.url"));

        $this->assertEquals("data.url", $audio->getData());
    }

    public function testDataId()
    {
        $audio = new Audio();

        $this->assertNull($audio->getDataId());

        $this->assertSame($audio, $audio->setDataId("data.id"));

        $this->assertEquals("data.id", $audio->getDataId());
    }

    public function testPlay()
    {
        $audio = new Audio();

        $this->assertNull($audio->getPlay());

        $this->assertSame($audio, $audio->setPlay(true));

        $this->assertTrue($audio->getPlay());
    }

    public function testLooping()
    {
        $audio = new Audio();

        $this->assertNull($audio->getPlay());

        $this->assertSame($audio, $audio->setPlay(true));

        $this->assertTrue($audio->getPlay());
    }

    public function testMusic()
    {
        $audio = new Audio();

        $this->assertNull($audio->getMusic());

        $this->assertSame($audio, $audio->setMusic(true));

        $this->assertTrue($audio->getMusic());
    }

    public function testVolume()
    {
        $audio = new Audio();

        $this->assertEquals(1., $audio->getVolume());

        $this->assertSame($audio, $audio->setVolume(0.5));

        $this->assertEquals(0.5, $audio->getVolume());
    }

    public function testScriptEvents()
    {
        $audio = new Audio();

        $this->assertNull($audio->getScriptEvents());

        $this->assertSame($audio, $audio->setScriptEvents(true));

        $this->assertTrue($audio->getScriptEvents());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $audio       = new Audio("test.audio");
        $audio->clearAlign()
              ->setData("some.url")
              ->setDataId("some.id")
              ->setPlay(true)
              ->setLooping(false)
              ->setVolume(0.3)
              ->setScriptEvents(true);

        $domElement = $audio->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<audio id=\"test.audio\" data=\"some.url\" dataid=\"some.id\" play=\"1\" looping=\"0\" volume=\"0.3\" scriptevents=\"1\"/>
", $domDocument->saveXML());
    }

}
