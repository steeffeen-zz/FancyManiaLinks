<?php

use FML\Elements\Format;

class FormatTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $format = Format::create();

        $this->assertNotNull($format);
    }

    public function testBgColor()
    {
        $format = new Format();

        $this->assertNull($format->getBgColor());

        $this->assertSame($format->setBgColor("test-color"), $format);

        $this->assertEquals($format->getBgColor(), "test-color");
    }

    public function testStyle()
    {
        $format = new Format();

        $this->assertNull($format->getStyle());

        $this->assertSame($format->setStyle("test-style"), $format);

        $this->assertEquals($format->getStyle(), "test-style");
    }

    public function testTextSize()
    {
        $format = new Format();

        $this->assertNull($format->getTextSize());

        $this->assertSame($format->setTextSize(13), $format);

        $this->assertEquals($format->getTextSize(), 13);
    }

    public function testTextFont()
    {
        $format = new Format();

        $this->assertNull($format->getTextFont());

        $this->assertSame($format->setTextFont("test-font"), $format);

        $this->assertEquals($format->getTextFont(), "test-font");
    }

    public function testTextColor()
    {
        $format = new Format();

        $this->assertNull($format->getTextColor());

        $this->assertSame($format->setTextColor("test-color"), $format);

        $this->assertEquals($format->getTextColor(), "test-color");
    }

    public function testAreaColor()
    {
        $format = new Format();

        $this->assertNull($format->getAreaColor());

        $this->assertSame($format->setAreaColor("test-color"), $format);

        $this->assertEquals($format->getAreaColor(), "test-color");
    }

    public function testAreaFocusColor()
    {
        $format = new Format();

        $this->assertNull($format->getAreaFocusColor());

        $this->assertSame($format->setAreaFocusColor("test-color"), $format);

        $this->assertEquals($format->getAreaFocusColor(), "test-color");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $format      = new Format();
        $format->setBgColor("some-bgcolor")
               ->setStyle("some-style")
               ->setTextSize(42)
               ->setTextFont("some-textfont")
               ->setTextColor("some-textcolor")
               ->setAreaColor("some-areacolor")
               ->setAreaFocusColor("some-areafocuscolor");

        $domElement = $format->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<format bgcolor=\"some-bgcolor\" style=\"some-style\" textsize=\"42\" textfont=\"some-textfont\" textcolor=\"some-textcolor\" focusareacolor1=\"some-areacolor\" focusareacolor2=\"some-areafocuscolor\"/>
");
    }

}
