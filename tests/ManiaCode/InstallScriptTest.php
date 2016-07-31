<?php

use FML\ManiaCode\InstallScript;

class InstallScriptTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installScript = InstallScript::create("create-name", "create-file", "create-url");

        $this->assertTrue($installScript instanceof InstallScript);
        $this->assertEquals("create-name", $installScript->getName());
        $this->assertEquals("create-file", $installScript->getFile());
        $this->assertEquals("create-url", $installScript->getUrl());
    }

    public function testConstruct()
    {
        $installScript = new InstallScript("new-name", "new-file", "new-url");

        $this->assertEquals("new-name", $installScript->getName());
        $this->assertEquals("new-file", $installScript->getFile());
        $this->assertEquals("new-url", $installScript->getUrl());
    }

    public function testName()
    {
        $installScript = new InstallScript();

        $this->assertNull($installScript->getName());

        $this->assertSame($installScript, $installScript->setName("test-name"));

        $this->assertEquals("test-name", $installScript->getName());
    }

    public function testFile()
    {
        $installScript = new InstallScript();

        $this->assertNull($installScript->getFile());

        $this->assertSame($installScript, $installScript->setFile("test-file"));

        $this->assertEquals("test-file", $installScript->getFile());
    }

    public function testUrl()
    {
        $installScript = new InstallScript();

        $this->assertNull($installScript->getUrl());

        $this->assertSame($installScript, $installScript->setUrl("test-url"));

        $this->assertEquals("test-url", $installScript->getUrl());
    }

    public function testRender()
    {
        $installScript = new InstallScript("some-name", "some-file", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $installScript->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<install_script><name>some-name</name><file>some-file</file><url>some-url</url></install_script>
", $domDocument->saveXML());
    }

}
