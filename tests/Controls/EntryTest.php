<?php

use FML\Controls\Entry;
use FML\Script\Features\EntrySubmit;

class EntryTest extends \PHPUnit_Framework_TestCase
{

    public function testName()
    {
        $entry = new Entry();

        $this->assertNull($entry->getName());

        $this->assertSame($entry, $entry->setName("test-name"));

        $this->assertEquals("test-name", $entry->getName());
    }

    public function testDefault()
    {
        $entry = new Entry();

        $this->assertNull($entry->getDefault());

        $this->assertSame($entry, $entry->setDefault("test-default"));

        $this->assertEquals("test-default", $entry->getDefault());
    }

    public function testSelectText()
    {
        $entry = new Entry();

        $this->assertNull($entry->getSelectText());

        $this->assertSame($entry, $entry->setSelectText(true));

        $this->assertTrue($entry->getSelectText());
    }

    public function testAutoNewLine()
    {
        $entry = new Entry();

        $this->assertNull($entry->getAutoNewLine());

        $this->assertSame($entry, $entry->setAutoNewLine(true));

        $this->assertTrue($entry->getAutoNewLine());
    }

    public function testTextFormat()
    {
        $entry = new Entry();

        $this->assertNull($entry->getTextFormat());

        $this->assertSame($entry, $entry->setTextFormat("test-format"));

        $this->assertEquals("test-format", $entry->getTextFormat());
    }

    public function testScriptEvents()
    {
        $entry = new Entry();

        $this->assertNull($entry->getScriptEvents());

        $this->assertSame($entry, $entry->setScriptEvents(true));

        $this->assertTrue($entry->getScriptEvents());
    }

    public function testStyle()
    {
        $entry = new Entry();

        $this->assertNull($entry->getStyle());

        $this->assertSame($entry, $entry->setStyle("test-style"));

        $this->assertEquals("test-style", $entry->getStyle());
    }

    public function testTextColor()
    {
        $entry = new Entry();

        $this->assertNull($entry->getTextColor());

        $this->assertSame($entry, $entry->setTextColor("test-color"));

        $this->assertEquals("test-color", $entry->getTextColor());
    }

    public function testTextSize()
    {
        $entry = new Entry();

        $this->assertNull($entry->getTextSize());

        $this->assertSame($entry, $entry->setTextSize(13));

        $this->assertEquals(13, $entry->getTextSize());
    }

    public function testTextFont()
    {
        $entry = new Entry();

        $this->assertNull($entry->getTextFont());

        $this->assertSame($entry, $entry->setTextFont("test-font"));

        $this->assertEquals("test-font", $entry->getTextFont());
    }

    public function testAreaColor()
    {
        $entry = new Entry();

        $this->assertNull($entry->getAreaColor());

        $this->assertSame($entry, $entry->setAreaColor("test-color"));

        $this->assertEquals("test-color", $entry->getAreaColor());
    }

    public function testAreaFocusColor()
    {
        $entry = new Entry();

        $this->assertNull($entry->getAreaFocusColor());

        $this->assertSame($entry, $entry->setAreaFocusColor("test-color"));

        $this->assertEquals("test-color", $entry->getAreaFocusColor());
    }

    public function testAutoComplete()
    {
        $entry = new Entry();

        $this->assertNull($entry->getAutoComplete());

        $this->assertSame($entry, $entry->setAutoComplete(true));

        $this->assertTrue($entry->getAutoComplete());
    }

    public function testAddSubmitFeature()
    {
        $entry = new Entry();

        $this->assertEmpty($entry->getScriptFeatures());

        $this->assertSame($entry, $entry->addSubmitFeature("test.url"));

        $scriptFeatures = $entry->getScriptFeatures();

        $this->assertCount(1, $scriptFeatures);

        /** @var EntrySubmit $entrySubmit */
        $entrySubmit = $scriptFeatures[0];

        $this->assertTrue($entrySubmit instanceof EntrySubmit);
        $this->assertSame($entry, $entrySubmit->getEntry());
        $this->assertEquals("test.url", $entrySubmit->getUrl());
    }

    public function testTagName()
    {
        $entry = new Entry();

        $this->assertEquals("entry", $entry->getTagName());
    }

    public function testManiaScriptClass()
    {
        $entry = new Entry();

        $this->assertEquals("CMlEntry", $entry->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $entry       = new Entry("test.entry");
        $entry->clearAlign()
              ->setName("some-name")
              ->setDefault("some-default")
              ->setSelectText(true)
              ->setAutoNewLine(true)
              ->setTextFormat("some-format")
              ->setScriptEvents(true)
              ->setStyle("some-style")
              ->setTextColor("some-color")
              ->setTextSize(42)
              ->setTextFont("some-font")
              ->setAreaColor("some-color")
              ->setAreaFocusColor("some-color");

        $domElement = $entry->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<entry id=\"test.entry\" name=\"some-name\" default=\"some-default\" selecttext=\"1\" autonewline=\"1\" textformat=\"some-format\" scriptevents=\"1\" style=\"some-style\" textcolor=\"some-color\" textsize=\"42\" textfont=\"some-font\" focusareacolor1=\"some-color\" focusareacolor2=\"some-color\"/>
", $domDocument->saveXML());
    }

    public function testRenderWithAutoComplete()
    {
        $domDocument = new \DOMDocument();
        $entry       = new Entry("test.auto.entry");
        $entry->clearAlign()
              ->setName("test-get-name")
              ->setAutoComplete(true);

        $domElement = $entry->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<entry id=\"test.auto.entry\" name=\"test-get-name\" default=\"test-get-value\"/>
", $domDocument->saveXML());
    }

}
