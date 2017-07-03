<?php

use FML\Elements\TemplateScript;

class TemplateScriptTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $parameters     = new stdClass();
        $templateScript = TemplateScript::create("./file.path", $parameters);

        $this->assertTrue($templateScript instanceof TemplateScript);
        $this->assertEquals("./file.path", $templateScript->getFilePath());
        $this->assertSame($parameters, $templateScript->getParameters());
    }

    public function testConstruct()
    {
        $parameters     = new stdClass();
        $templateScript = new TemplateScript("./file.location", $parameters);

        $this->assertEquals("./file.location", $templateScript->getFilePath());
        $this->assertSame($parameters, $templateScript->getParameters());
    }

    public function testFilePath()
    {
        $templateScript = new TemplateScript();

        $this->assertNull($templateScript->getFilePath());

        $this->assertSame($templateScript, $templateScript->setFilePath("/file/path"));

        $this->assertEquals("/file/path", $templateScript->getFilePath());
    }

    public function testParameters()
    {
        $parameters     = array("Name" => "Value");
        $templateScript = new TemplateScript();

        $this->assertNull($templateScript->getParameters());

        $this->assertSame($templateScript, $templateScript->setParameters($parameters));

        $this->assertSame($parameters, $templateScript->getParameters());
    }

    public function testGetScriptText()
    {
        $templateScript = new TemplateScript(__DIR__ . "/TemplateScript.txt", array("LogValue" => "some log"));

        $scriptText = $templateScript->getScriptText();

        $this->assertEquals("main() { log(\"some log\"); }", $scriptText);

        $scriptText = $templateScript->getScriptText(array("LogValue" => "some other log"));

        $this->assertEquals("main() { log(\"some other log\"); }", $scriptText);
    }

    public function testRender()
    {
        $domDocument    = new \DOMDocument();
        $templateScript = new TemplateScript(__DIR__ . "/TemplateScript.txt", array("LogValue" => "test log"));

        $domElement = $templateScript->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<script><!--main() { log(\"test log\"); }--></script>
", $domDocument->saveXML());
    }

}
