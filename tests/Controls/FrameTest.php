<?php

use FML\Controls\Audio;
use FML\Controls\Frame;
use FML\Elements\Format;
use FML\Script\Features\Preload;

class FrameTest extends \PHPUnit_Framework_TestCase
{

    public function testChildren()
    {
        $frame       = new Frame();
        $firstChild  = new Audio();
        $secondChild = new Audio();

        $this->assertEmpty($frame->getChildren());

        $this->assertSame($frame, $frame->addChild($firstChild));

        $this->assertEquals(array($firstChild), $frame->getChildren());

        $this->assertSame($frame, $frame->addChildren(array($firstChild, $secondChild)));

        $this->assertEquals(array($firstChild, $secondChild), $frame->getChildren());

        $this->assertSame($frame, $frame->removeAllChildren());

        $this->assertEmpty($frame->getChildren());
    }

    public function testFormat()
    {
        $frame  = new Frame();
        $format = new Format();

        $this->assertNull($frame->getFormat());

        $this->assertSame($frame, $frame->setFormat($format));

        $this->assertSame($format, $frame->getFormat());
    }

    public function testScriptFeaturesWithChild()
    {
        $frame          = new Frame();
        $child          = new Audio();
        $preloadFeature = new Preload();
        $child->addScriptFeature($preloadFeature);

        $this->assertEmpty($frame->getScriptFeatures());

        $frame->addChild($child);

        $this->assertEquals(array($preloadFeature), $frame->getScriptFeatures());

        $frame->removeAllChildren();

        $this->assertEmpty($frame->getScriptFeatures());
    }

    public function testTagName()
    {
        $frame = new Frame();

        $this->assertEquals("frame", $frame->getTagName());
    }

    public function testManiaScriptClass()
    {
        $frame = new Frame();

        $this->assertEquals("CMlFrame", $frame->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $frame       = new Frame("some.frame");
        $frame->clearAlign();

        $domElement = $frame->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<frame id=\"some.frame\"/>
", $domDocument->saveXML());
    }

    public function testRenderWithFormatAndChild()
    {
        $domDocument = new \DOMDocument();
        $frame       = new Frame("test.frame");
        $format      = new Format();
        $format->setStyle("test.style");
        $child = new Audio("test.audio");
        $child->clearAlign();
        $frame->clearAlign()
              ->setFormat($format)
              ->addChild($child);

        $domElement = $frame->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<frame id=\"test.frame\"><format style=\"test.style\"/><audio id=\"test.audio\"/></frame>
", $domDocument->saveXML());
    }

}
