<?php

use FML\Controls\Audio;

class AudioTest extends \PHPUnit_Framework_TestCase
{

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

        $this->assertTrue($audio->getLooping());

        $this->assertSame($audio, $audio->setLooping(false));

        $this->assertFalse($audio->getLooping());
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

    public function testScriptActionAndParameters()
    {
        $audio = new Audio();

        $this->assertNull($audio->getScriptAction());
        $this->assertNull($audio->getScriptActionParameters());

        $this->assertSame($audio, $audio->setScriptAction("test-action"));

        $this->assertEquals("test-action", $audio->getScriptAction());
        $this->assertNull($audio->getScriptActionParameters());

        $this->assertSame($audio, $audio->setScriptAction("test-action-2", array("param1", "param2")));

        $this->assertEquals("test-action-2", $audio->getScriptAction());
        $this->assertEquals(array("param1", "param2"), $audio->getScriptActionParameters());
    }

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

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $audio       = new Audio("test.audio");
        $audio->clearAlign()
              ->setData("some.url")
              ->setDataId("some.id")
              ->setPlay(true)
              ->setLooping(false)
              ->setMusic(true)
              ->setVolume(0.3)
              ->setScriptEvents(true)
              ->setScriptAction("some-action", array("param1", "param2"));

        $domElement = $audio->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<audio id=\"test.audio\" data=\"some.url\" dataid=\"some.id\" play=\"1\" looping=\"0\" music=\"1\" volume=\"0.3\" scriptevents=\"1\" scriptaction=\"some-action'param1'param2\"/>
", $domDocument->saveXML());
    }

}
