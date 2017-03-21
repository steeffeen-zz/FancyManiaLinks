<?php

use FML\Controls\TextEdit;

class TextEditTest extends \PHPUnit_Framework_TestCase
{

    public function testDefault()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getDefault());

        $this->assertSame($textEdit, $textEdit->setDefault("test-default"));

        $this->assertEquals("test-default", $textEdit->getDefault());
    }

    public function testAutoNewLine()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getAutoNewLine());

        $this->assertSame($textEdit, $textEdit->setAutoNewLine(true));

        $this->assertTrue($textEdit->getAutoNewLine());
    }

    public function testLineSpacing()
    {
        $textEdit = new TextEdit();

        $this->assertEquals(-1., $textEdit->getLineSpacing());

        $this->assertSame($textEdit, $textEdit->setLineSpacing(13.37));

        $this->assertEquals(13.37, $textEdit->getLineSpacing());
    }

    public function testMaxLines()
    {
        $textEdit = new TextEdit();

        $this->assertEquals(-1, $textEdit->getMaxLines());

        $this->assertSame($textEdit, $textEdit->setMaxLines(13));

        $this->assertEquals(13, $textEdit->getMaxLines());
    }

    public function testShowLineNumbers()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getShowLineNumbers());

        $this->assertSame($textEdit, $textEdit->setShowLineNumbers(true));

        $this->assertTrue($textEdit->getShowLineNumbers());
    }

    public function testTextFormat()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getTextFormat());

        $this->assertSame($textEdit, $textEdit->setTextFormat("test-format"));

        $this->assertEquals("test-format", $textEdit->getTextFormat());
    }

    public function testScriptEvents()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getScriptEvents());

        $this->assertSame($textEdit, $textEdit->setScriptEvents(true));

        $this->assertTrue($textEdit->getScriptEvents());
    }

    public function testScriptAction()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getScriptAction());

        $this->assertSame($textEdit, $textEdit->setScriptAction("test-action'param1'param2"));

        $this->assertEquals("test-action'param1'param2", $textEdit->getScriptAction());
    }

    public function testStyle()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getStyle());

        $this->assertSame($textEdit, $textEdit->setStyle("test-style"));

        $this->assertEquals("test-style", $textEdit->getStyle());
    }

    public function testTextColor()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getTextColor());

        $this->assertSame($textEdit, $textEdit->setTextColor("test-color"));

        $this->assertEquals("test-color", $textEdit->getTextColor());
    }

    public function testTextSize()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getTextSize());

        $this->assertSame($textEdit, $textEdit->setTextSize(13));

        $this->assertEquals(13, $textEdit->getTextSize());
    }

    public function testTextFont()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getTextFont());

        $this->assertSame($textEdit, $textEdit->setTextFont("test-font"));

        $this->assertEquals("test-font", $textEdit->getTextFont());
    }

    public function testAreaColor()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getAreaColor());

        $this->assertSame($textEdit, $textEdit->setAreaColor("test-color"));

        $this->assertEquals("test-color", $textEdit->getAreaColor());
    }

    public function testAreaFocusColor()
    {
        $textEdit = new TextEdit();

        $this->assertNull($textEdit->getAreaFocusColor());

        $this->assertSame($textEdit, $textEdit->setAreaFocusColor("test-color"));

        $this->assertEquals("test-color", $textEdit->getAreaFocusColor());
    }

    public function testTagName()
    {
        $textEdit = new TextEdit();

        $this->assertEquals("textedit", $textEdit->getTagName());
    }

    public function testManiaScriptClass()
    {
        $textEdit = new TextEdit();

        $this->assertEquals("CMlTextEdit", $textEdit->getManiaScriptClass());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $textEdit    = new TextEdit("test.textedit");
        $textEdit->clearAlign()
                 ->setDefault("some-default")
                 ->setAutoNewLine(true)
                 ->setLineSpacing(12.34)
                 ->setMaxLines(42)
                 ->setShowLineNumbers(true)
                 ->setTextFormat("some-format")
                 ->setScriptEvents(true)
                 ->setScriptAction("some-action'param1'param2")
                 ->setStyle("some-style")
                 ->setTextColor("some-color")
                 ->setTextSize(42)
                 ->setTextFont("some-font")
                 ->setAreaColor("some-color")
                 ->setAreaFocusColor("some-color");

        $domElement = $textEdit->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<textedit id=\"test.textedit\" default=\"some-default\" autonewline=\"1\" linespacing=\"12.34\" maxline=\"42\" showlinenumbers=\"1\" textformat=\"some-format\" scriptevents=\"1\" scriptaction=\"some-action'param1'param2\" style=\"some-style\" textcolor=\"some-color\" textsize=\"42\" textfont=\"some-font\" focusareacolor1=\"some-color\" focusareacolor2=\"some-color\"/>
", $domDocument->saveXML());
    }

}
