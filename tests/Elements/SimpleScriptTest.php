<?php

use FML\Elements\SimpleScript;

class SimpleScriptTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $simpleScript = SimpleScript::create("test script");

        $this->assertNotNull($simpleScript);
        $this->assertEquals($simpleScript->getText(), "test script");
    }

    public function testConstruct()
    {
        $simpleScript = SimpleScript::create("some script");

        $this->assertEquals($simpleScript->getText(), "some script");
    }

    public function testText()
    {
        $simpleScript = new SimpleScript();

        $this->assertNull($simpleScript->getText());

        $this->assertSame($simpleScript, $simpleScript->setText("other script"));

        $this->assertEquals("other script", $simpleScript->getText());
    }

    public function testRender()
    {
        $domDocument  = new \DOMDocument();
        $simpleScript = new SimpleScript("return;");

        $domElement = $simpleScript->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<script><!--return;--></script>
", $domDocument->saveXML());
    }

}
