<?php

use FML\Controls\Label;
use FML\Script\Features\Clock;

class LabelTest extends \PHPUnit_Framework_TestCase
{

    public function testText()
    {
        $label = new Label();

        $this->assertNull($label->getText());

        $this->assertSame($label, $label->setText("test-text"));

        $this->assertEquals("test-text", $label->getText());
    }

    public function testTextId()
    {
        $label = new Label();

        $this->assertNull($label->getTextId());

        $this->assertSame($label, $label->setTextId("test-textid"));

        $this->assertEquals("test-textid", $label->getTextId());
    }

    public function testTextPrefix()
    {
        $label = new Label();

        $this->assertNull($label->getTextPrefix());

        $this->assertSame($label, $label->setTextPrefix("test-prefix"));

        $this->assertEquals("test-prefix", $label->getTextPrefix());
    }

    public function testTextEmboss()
    {
        $label = new Label();

        $this->assertNull($label->getTextEmboss());

        $this->assertSame($label, $label->setTextEmboss(true));

        $this->assertTrue($label->getTextEmboss());
    }

    public function testTranslate()
    {
        $label = new Label();

        $this->assertNull($label->getTranslate());

        $this->assertSame($label, $label->setTranslate(true));

        $this->assertTrue($label->getTranslate());
    }

    public function testMaxLines()
    {
        $label = new Label();

        $this->assertEquals(-1, $label->getMaxLines());

        $this->assertSame($label, $label->setMaxLines(13));

        $this->assertEquals(13, $label->getMaxLines());
    }

    public function testOpacity()
    {
        $label = new Label();

        $this->assertEquals(1., $label->getOpacity());

        $this->assertSame($label, $label->setOpacity(0.7));

        $this->assertEquals(0.7, $label->getOpacity());
    }

    public function testAction()
    {
        $label = new Label();

        $this->assertNull($label->getAction());

        $this->assertSame($label, $label->setAction("test-action"));

        $this->assertEquals("test-action", $label->getAction());
    }

    public function testActionKey()
    {
        $label = new Label();

        $this->assertEquals(-1, $label->getActionKey());

        $this->assertSame($label, $label->setActionKey(13));

        $this->assertEquals(13, $label->getActionKey());
    }

    public function testUrl()
    {
        $label = new Label();

        $this->assertNull($label->getUrl());

        $this->assertSame($label, $label->setUrl("test.url"));

        $this->assertEquals("test.url", $label->getUrl());
    }

    public function testUrlId()
    {
        $label = new Label();

        $this->assertNull($label->getUrlId());

        $this->assertSame($label, $label->setUrlId("test-urlid"));

        $this->assertEquals("test-urlid", $label->getUrlId());
    }

    public function testManialink()
    {
        $label = new Label();

        $this->assertNull($label->getManialink());

        $this->assertSame($label, $label->setManialink("test-manialink"));

        $this->assertEquals("test-manialink", $label->getManialink());
    }

    public function testManialinkId()
    {
        $label = new Label();

        $this->assertNull($label->getManialinkId());

        $this->assertSame($label, $label->setManialinkId("test-manialinkid"));

        $this->assertEquals("test-manialinkid", $label->getManialinkId());
    }

    public function testAutoNewLine()
    {
        $label = new Label();

        $this->assertNull($label->getAutoNewLine());

        $this->assertSame($label, $label->setAutoNewLine(true));

        $this->assertTrue($label->getAutoNewLine());
    }

    public function testScriptEvents()
    {
        $label = new Label();

        $this->assertNull($label->getScriptEvents());

        $this->assertSame($label, $label->setScriptEvents(true));

        $this->assertTrue($label->getScriptEvents());
    }

    public function testStyle()
    {
        $label = new Label();

        $this->assertNull($label->getStyle());

        $this->assertSame($label, $label->setStyle("test-style"));

        $this->assertEquals("test-style", $label->getStyle());
    }

    public function testTextSize()
    {
        $label = new Label();

        $this->assertEquals(-1, $label->getTextSize());

        $this->assertSame($label, $label->setTextSize(13));

        $this->assertEquals(13, $label->getTextSize());
    }

    public function testTextFont()
    {
        $label = new Label();

        $this->assertNull($label->getTextFont());

        $this->assertSame($label, $label->setTextFont("test-font"));

        $this->assertEquals("test-font", $label->getTextFont());
    }

    public function testTextColor()
    {
        $label = new Label();

        $this->assertNull($label->getTextColor());

        $this->assertSame($label, $label->setTextColor("test-color"));

        $this->assertEquals("test-color", $label->getTextColor());
    }

    public function testAreaColor()
    {
        $label = new Label();

        $this->assertNull($label->getAreaColor());

        $this->assertSame($label, $label->setAreaColor("test-color"));

        $this->assertEquals("test-color", $label->getAreaColor());
    }

    public function testAreaFocusColor()
    {
        $label = new Label();

        $this->assertNull($label->getAreaFocusColor());

        $this->assertSame($label, $label->setAreaFocusColor("test-color"));

        $this->assertEquals("test-color", $label->getAreaFocusColor());
    }

    public function testAddClockFeature()
    {
        $label = new Label();

        $this->assertEmpty($label->getScriptFeatures());

        $this->assertSame($label, $label->addClockFeature(true, false));

        $scriptFeatures = $label->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var Clock $clock */
        $clock = $scriptFeatures[0];

        $this->assertTrue($clock instanceof Clock);
        $this->assertSame($label, $clock->getLabel());
        $this->assertTrue($clock->getShowSeconds());
        $this->assertFalse($clock->getShowFullDate());
    }

    public function testTagName()
    {
        $label = new Label();

        $this->assertEquals("label", $label->getTagName());
    }

    public function testManiaScriptClass()
    {
        $label = new Label();

        $this->assertEquals("CMlLabel", $label->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $label       = new Label("test.label");
        $label->clearAlign()
              ->setText("some-text")
              ->setTextId("some-id")
              ->setTextPrefix("some-prefix")
              ->setTextEmboss(true)
              ->setTranslate(true)
              ->setMaxLines(42)
              ->setOpacity(0.5)
              ->setAction("some-action")
              ->setActionKey(42)
              ->setUrl("some.url")
              ->setUrlId("some.urlid")
              ->setManialink("some-manialink")
              ->setManialinkId("some-manialinkid")
              ->setAutoNewLine(true)
              ->setScriptEvents(true)
              ->setStyle("some-style")
              ->setTextSize(42)
              ->setTextFont("some-font")
              ->setTextColor("some-color")
              ->setAreaColor("some-color")
              ->setAreaFocusColor("some-color");

        $domElement = $label->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<label id=\"test.label\" text=\"some-text\" textid=\"some-id\" textprefix=\"some-prefix\" textemboss=\"1\" translate=\"1\" maxlines=\"42\" opacity=\"0.5\" action=\"some-action\" actionkey=\"42\" url=\"some.url\" urlid=\"some.urlid\" manialink=\"some-manialink\" manialinkid=\"some-manialinkid\" autonewline=\"1\" scriptevents=\"1\" style=\"some-style\" textsize=\"42\" textfont=\"some-font\" textcolor=\"some-color\" focusareacolor1=\"some-color\" focusareacolor2=\"some-color\"/>
", $domDocument->saveXML());
    }

}
