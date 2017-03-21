<?php

use FML\Controls\Video;

class VideoTest extends \PHPUnit_Framework_TestCase
{

    public function testData()
    {
        $video = new Video();

        $this->assertNull($video->getData());

        $this->assertSame($video, $video->setData("data.url"));

        $this->assertEquals("data.url", $video->getData());
    }

    public function testDataId()
    {
        $video = new Video();

        $this->assertNull($video->getDataId());

        $this->assertSame($video, $video->setDataId("data.id"));

        $this->assertEquals("data.id", $video->getDataId());
    }

    public function testPlay()
    {
        $video = new Video();

        $this->assertNull($video->getPlay());

        $this->assertSame($video, $video->setPlay(true));

        $this->assertTrue($video->getPlay());
    }

    public function testLooping()
    {
        $video = new Video();

        $this->assertTrue($video->getLooping());

        $this->assertSame($video, $video->setLooping(false));

        $this->assertFalse($video->getLooping());
    }

    public function testMusic()
    {
        $video = new Video();

        $this->assertNull($video->getMusic());

        $this->assertSame($video, $video->setMusic(true));

        $this->assertTrue($video->getMusic());
    }

    public function testVolume()
    {
        $video = new Video();

        $this->assertEquals(1., $video->getVolume());

        $this->assertSame($video, $video->setVolume(0.5));

        $this->assertEquals(0.5, $video->getVolume());
    }

    public function testScriptEvents()
    {
        $video = new Video();

        $this->assertNull($video->getScriptEvents());

        $this->assertSame($video, $video->setScriptEvents(true));

        $this->assertTrue($video->getScriptEvents());
    }

    public function testScriptAction()
    {
        $video = new Video();

        $this->assertNull($video->getScriptAction());

        $this->assertSame($video, $video->setScriptAction("test-action'param1'param2"));

        $this->assertEquals("test-action'param1'param2", $video->getScriptAction());
    }

    public function testTagName()
    {
        $video = new Video();

        $tagName = $video->getTagName();

        $this->assertEquals("video", $tagName);
    }

    public function testManiaScriptClass()
    {
        $video = new Video();

        $maniaScriptClass = $video->getManiaScriptClass();

        $this->assertEquals("CMlMediaPlayer", $maniaScriptClass);
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $video       = new Video("test.video");
        $video->clearAlign()
              ->setData("some.url")
              ->setDataId("some.id")
              ->setPlay(true)
              ->setLooping(false)
              ->setMusic(true)
              ->setVolume(0.3)
              ->setScriptEvents(true)
              ->setScriptAction("some-action'param1'param2");

        $domElement = $video->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<video id=\"test.video\" data=\"some.url\" dataid=\"some.id\" play=\"1\" looping=\"0\" music=\"1\" volume=\"0.3\" scriptevents=\"1\" scriptaction=\"some-action'param1'param2\"/>
", $domDocument->saveXML());
    }

}
