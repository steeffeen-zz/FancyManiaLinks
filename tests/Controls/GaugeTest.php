<?php

use FML\Controls\Gauge;

class GaugeTest extends \PHPUnit_Framework_TestCase
{

    public function testRatio()
    {
        $gauge = new Gauge();

        $this->assertEquals(0.0, $gauge->getRatio());

        $this->assertSame($gauge, $gauge->setRatio(0.3));

        $this->assertEquals(0.3, $gauge->getRatio());
    }

    public function testGrading()
    {
        $gauge = new Gauge();

        $this->assertEquals(1.0, $gauge->getGrading());

        $this->assertSame($gauge, $gauge->setGrading(0.6));

        $this->assertEquals(0.6, $gauge->getGrading());
    }

    public function testColor()
    {
        $gauge = new Gauge();

        $this->assertNull($gauge->getColor());

        $this->assertSame($gauge, $gauge->setColor("test-color"));

        $this->assertEquals("test-color", $gauge->getColor());
    }

    public function testCentered()
    {
        $gauge = new Gauge();

        $this->assertNull($gauge->getCentered());

        $this->assertSame($gauge, $gauge->setCentered(true));

        $this->assertTrue($gauge->getCentered());
    }

    public function testClan()
    {
        $gauge = new Gauge();

        $this->assertNull($gauge->getClan());

        $this->assertSame($gauge, $gauge->setClan(2));

        $this->assertEquals(2, $gauge->getClan());
    }

    public function testDrawBackground()
    {
        $gauge = new Gauge();

        $this->assertTrue($gauge->getDrawBackground());

        $this->assertSame($gauge, $gauge->setDrawBackground(false));

        $this->assertFalse($gauge->getDrawBackground());
    }

    public function testDrawBlockBackground()
    {
        $gauge = new Gauge();

        $this->assertTrue($gauge->getDrawBlockBackground());

        $this->assertSame($gauge, $gauge->setDrawBlockBackground(false));

        $this->assertFalse($gauge->getDrawBlockBackground());
    }

    public function testStyle()
    {
        $gauge = new Gauge();

        $this->assertNull($gauge->getStyle());

        $this->assertSame($gauge, $gauge->setStyle("test-style"));

        $this->assertEquals("test-style", $gauge->getStyle());
    }

    public function testTagName()
    {
        $gauge = new Gauge();

        $this->assertEquals("gauge", $gauge->getTagName());
    }

    public function testManiaScriptClass()
    {
        $gauge = new Gauge();

        $this->assertEquals("CMlGauge", $gauge->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $gauge       = new Gauge("test.gauge");
        $gauge->clearAlign()
              ->setRatio(0.7)
              ->setGrading(0.1)
              ->setColor("some-color")
              ->setCentered(true)
              ->setDrawBackground(false)
              ->setDrawBlockBackground(false)
              ->setStyle("some-style");

        $domElement = $gauge->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<gauge id=\"test.gauge\" ratio=\"0.7\" grading=\"0.1\" color=\"some-color\" centered=\"1\" drawbg=\"0\" drawblockbg=\"0\" style=\"some-style\"/>
", $domDocument->saveXML());
    }

}
