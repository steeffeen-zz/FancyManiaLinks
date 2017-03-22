<?php

use FML\Controls\Frame3d;
use FML\Stylesheet\Style3d;

class Frame3dTest extends \PHPUnit_Framework_TestCase
{

    public function testStyle3dId()
    {
        $frame3d = new Frame3d();

        $this->assertNull($frame3d->getStyle3dId());

        $this->assertSame($frame3d, $frame3d->setStyle3dId("style.id"));

        $this->assertEquals("style.id", $frame3d->getStyle3dId());
    }

    public function testStyle3d()
    {
        $frame3d = new Frame3d();
        $style3d = new Style3d();

        $this->assertNull($frame3d->getStyle3d());

        $this->assertSame($frame3d, $frame3d->setStyle3d($style3d));

        $this->assertSame($style3d, $frame3d->getStyle3d());
    }

    public function testStyle3dIdAndStyle3d()
    {
        $frame3d = new Frame3d();
        $style3d = new Style3d();

        $this->assertNull($frame3d->getStyle3dId());
        $this->assertNull($frame3d->getStyle3d());

        $frame3d->setStyle3dId("test.style.id");

        $this->assertEquals("test.style.id", $frame3d->getStyle3dId());
        $this->assertNull($frame3d->getStyle3d());

        $frame3d->setStyle3d($style3d);

        $this->assertNull($frame3d->getStyle3dId());
        $this->assertSame($style3d, $frame3d->getStyle3d());

        $frame3d->setStyle3dId("other.style.id");

        $this->assertEquals("other.style.id", $frame3d->getStyle3dId());
        $this->assertNull($frame3d->getStyle3d());
    }

    public function testScriptEvents()
    {
        $frame3d = new Frame3d();

        $this->assertNull($frame3d->getScriptEvents());

        $this->assertSame($frame3d, $frame3d->setScriptEvents(true));

        $this->assertTrue($frame3d->getScriptEvents());
    }

    public function testScriptActionAndParameters()
    {
        $frame3d = new Frame3d();

        $this->assertNull($frame3d->getScriptAction());
        $this->assertNull($frame3d->getScriptActionParameters());

        $this->assertSame($frame3d, $frame3d->setScriptAction("test-action"));

        $this->assertEquals("test-action", $frame3d->getScriptAction());
        $this->assertNull($frame3d->getScriptActionParameters());

        $this->assertSame($frame3d, $frame3d->setScriptAction("test-action-2", array("param1", "param2")));

        $this->assertEquals("test-action-2", $frame3d->getScriptAction());
        $this->assertEquals(array("param1", "param2"), $frame3d->getScriptActionParameters());
    }

    public function testTagName()
    {
        $frame3d = new Frame3d();

        $this->assertEquals("frame3d", $frame3d->getTagName());
    }

    public function testRenderWithModelId()
    {
        $domDocument = new \DOMDocument();
        $frame3d     = new Frame3d("some.frame.3d");
        $frame3d->clearAlign()
                ->setStyle3dId("some.style.3d")
                ->setScriptEvents(true)
                ->setScriptAction("some-action", array("param1", "param2"));

        $domElement = $frame3d->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<frame3d id=\"some.frame.3d\" style3d=\"some.style.3d\" scriptevents=\"1\" scriptaction=\"some-action'param1'param2\"/>
", $domDocument->saveXML());
    }

    public function testRenderWithModel()
    {
        $domDocument = new \DOMDocument();
        $frame3d     = new Frame3d("test.frame.3d");
        $style3d     = new Style3d("test.style.3d");
        $frame3d->clearAlign()
                ->setStyle3d($style3d);

        $domElement = $frame3d->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<frame3d id=\"test.frame.3d\" style3d=\"test.style.3d\"/>
", $domDocument->saveXML());
    }

}
