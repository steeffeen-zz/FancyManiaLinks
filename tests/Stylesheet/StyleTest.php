<?php

use FML\Controls\Label;
use FML\Stylesheet\Style;

class StyleTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $style = Style::create();

        $this->assertTrue($style instanceof Style);
    }

    public function testStyleIds()
    {
        $style = new Style();
        $label = new Label("test.label");

        $this->assertEmpty($style->getStyleIds());

        $this->assertSame($style, $style->addStyleId("test-id1"));

        $this->assertEquals(array("test-id1"), $style->getStyleIds());

        $this->assertSame($style, $style->addStyleIds(array("test-id1", "test-id2")));

        $this->assertEquals(array("test-id1", "test-id2"), $style->getStyleIds());

        $this->assertSame($style, $style->removeAllStyleIds());

        $this->assertEmpty($style->getStyleIds());

        $this->assertSame($style, $style->applyToControl($label));

        $this->assertEquals(array("test.label"), $style->getStyleIds());
    }

    public function testStyleClasses()
    {
        $style = new Style();
        $label = new Label("test.label");
        $label->addClasses(array("label.class1", "label.class2"));

        $this->assertEmpty($style->getStyleClasses());

        $this->assertSame($style, $style->addStyleClass("test-class1"));

        $this->assertEquals(array("test-class1"), $style->getStyleClasses());

        $this->assertSame($style, $style->addStyleClasses(array("test-class1", "test-class2")));

        $this->assertEquals(array("test-class1", "test-class2"), $style->getStyleClasses());

        $this->assertSame($style, $style->removeAllStyleClasses());

        $this->assertEmpty($style->getStyleClasses());

        $this->assertSame($style, $style->applyToControlViaClasses($label));

        $this->assertEquals(array("label.class1", "label.class2"), $style->getStyleClasses());
    }

    public function testBackgroundColor()
    {
        $style = new Style();

        $this->assertNull($style->getBackgroundColor());

        $this->assertSame($style, $style->setBackgroundColor("test-color"));

        $this->assertEquals("test-color", $style->getBackgroundColor());

        $this->assertSame($style, $style->setBgColor("test-color-deprecated"));

        $this->assertEquals("test-color-deprecated", $style->getBackgroundColor());
    }

    public function testFocusBackgroundColor()
    {
        $style = new Style();

        $this->assertNull($style->getFocusBackgroundColor());

        $this->assertSame($style, $style->setFocusBackgroundColor("test-focus-color"));

        $this->assertEquals("test-focus-color", $style->getFocusBackgroundColor());
    }

    public function testColor()
    {
        $style = new Style();

        $this->assertNull($style->getColor());

        $this->assertSame($style, $style->setColor("test-color"));

        $this->assertEquals("test-color", $style->getColor());
    }

    public function testStyle()
    {
        $style = new Style();

        $this->assertNull($style->getStyle());

        $this->assertSame($style, $style->setStyle("test-style"));

        $this->assertEquals("test-style", $style->getStyle());
    }

    public function testSubStyle()
    {
        $style = new Style();

        $this->assertNull($style->getSubStyle());

        $this->assertSame($style, $style->setSubStyle("test-substyle"));

        $this->assertEquals("test-substyle", $style->getSubStyle());
    }

    public function testStyles()
    {
        $style = new Style();

        $this->assertNull($style->getStyle());
        $this->assertNull($style->getSubStyle());

        $this->assertSame($style, $style->setStyles("test-style", "test-substyle"));

        $this->assertEquals("test-style", $style->getStyle());
        $this->assertEquals("test-substyle", $style->getSubStyle());
    }

    public function testTextSize()
    {
        $style = new Style();

        $this->assertNull($style->getTextSize());

        $this->assertSame($style, $style->setTextSize(13));

        $this->assertEquals(13, $style->getTextSize());
    }

    public function testTextFont()
    {
        $style = new Style();

        $this->assertNull($style->getTextFont());

        $this->assertSame($style, $style->setTextFont("test-font"));

        $this->assertEquals("test-font", $style->getTextFont());
    }

    public function testTextColor()
    {
        $style = new Style();

        $this->assertNull($style->getTextColor());

        $this->assertSame($style, $style->setTextColor("test-color"));

        $this->assertEquals("test-color", $style->getTextColor());
    }

    public function testAreaColor()
    {
        $style = new Style();

        $this->assertNull($style->getAreaColor());

        $this->assertSame($style, $style->setAreaColor("test-color"));

        $this->assertEquals("test-color", $style->getAreaColor());
    }

    public function testAreaFocusColor()
    {
        $style = new Style();

        $this->assertNull($style->getAreaFocusColor());

        $this->assertSame($style, $style->setAreaFocusColor("test-color"));

        $this->assertEquals("test-color", $style->getAreaFocusColor());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $style       = new Style();
        $style->setStyleIds(array("some-id1", "some-id2"))
              ->setStyleClasses(array("some-class1", "some-class2"))
              ->setBackgroundColor("some-bgcolor")
              ->setFocusBackgroundColor("some-focus-bgcolor")
              ->setColor("some-color")
              ->setStyle("some-style")
              ->setSubStyle("some-substyle")
              ->setTextSize(42)
              ->setTextFont("some-textfont")
              ->setTextColor("some-textcolor")
              ->setAreaColor("some-areacolor")
              ->setAreaFocusColor("some-areafocuscolor");

        $domElement = $style->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<style id=\"some-id1 some-id2\" class=\"some-class1 some-class2\" bgcolor=\"some-bgcolor\" bgcolorfocus=\"some-focus-bgcolor\" color=\"some-color\" style=\"some-style\" substyle=\"some-substyle\" textsize=\"42\" textfont=\"some-textfont\" textcolor=\"some-textcolor\" focusareacolor1=\"some-areacolor\" focusareacolor2=\"some-areafocuscolor\"/>
", $domDocument->saveXML());
    }

}
