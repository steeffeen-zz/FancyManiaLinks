<?php

use FML\Elements\Format;

class FormatTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $format = Format::create();

        $this->assertTrue($format instanceof Format);
    }

    public function testBackgroundColor()
    {
        $format = new Format();

        $this->assertNull($format->getBackgroundColor());

        $this->assertSame($format, $format->setBackgroundColor("test-color"));

        $this->assertEquals("test-color", $format->getBackgroundColor());
    }

    public function testFocusBackgroundColor()
    {
        $format = new Format();

        $this->assertNull($format->getFocusBackgroundColor());

        $this->assertSame($format, $format->setFocusBackgroundColor("test-focus-color"));

        $this->assertEquals("test-focus-color", $format->getFocusBackgroundColor());
    }

    public function testStyle()
    {
        $format = new Format();

        $this->assertNull($format->getStyle());

        $this->assertSame($format, $format->setStyle("test-style"));

        $this->assertEquals("test-style", $format->getStyle());
    }

    public function testTextSize()
    {
        $format = new Format();

        $this->assertNull($format->getTextSize());

        $this->assertSame($format, $format->setTextSize(13));

        $this->assertEquals(13, $format->getTextSize());
    }

    public function testTextFont()
    {
        $format = new Format();

        $this->assertNull($format->getTextFont());

        $this->assertSame($format, $format->setTextFont("test-font"));

        $this->assertEquals("test-font", $format->getTextFont());
    }

    public function testTextColor()
    {
        $format = new Format();

        $this->assertNull($format->getTextColor());

        $this->assertSame($format, $format->setTextColor("test-color"));

        $this->assertEquals("test-color", $format->getTextColor());
    }

    public function testAreaColor()
    {
        $format = new Format();

        $this->assertNull($format->getAreaColor());

        $this->assertSame($format, $format->setAreaColor("test-color"));

        $this->assertEquals("test-color", $format->getAreaColor());
    }

    public function testAreaFocusColor()
    {
        $format = new Format();

        $this->assertNull($format->getAreaFocusColor());

        $this->assertSame($format, $format->setAreaFocusColor("test-color"));

        $this->assertEquals("test-color", $format->getAreaFocusColor());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $format      = new Format();
        $format->setBackgroundColor("some-bgcolor")
               ->setFocusBackgroundColor("some-focus-color")
               ->setStyle("some-style")
               ->setTextSize(42)
               ->setTextFont("some-textfont")
               ->setTextColor("some-textcolor")
               ->setAreaColor("some-areacolor")
               ->setAreaFocusColor("some-areafocuscolor");

        $domElement = $format->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<format bgcolor=\"some-bgcolor\" bgcolorfocus=\"some-focus-color\" style=\"some-style\" textsize=\"42\" textfont=\"some-textfont\" textcolor=\"some-textcolor\" focusareacolor1=\"some-areacolor\" focusareacolor2=\"some-areafocuscolor\"/>
", $domDocument->saveXML());
    }

}
