<?php

use FML\ManiaCode\InstallScript;

class InstallScriptTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installScript = InstallScript::create("create-name", "create-file", "create-url");

        $this->assertTrue($installScript instanceof InstallScript);
        $this->assertEquals($installScript->getName(), "create-name");
        $this->assertEquals($installScript->getFile(), "create-file");
        $this->assertEquals($installScript->getUrl(), "create-url");
    }

    public function testConstruct()
    {
        $installScript = new InstallScript("new-name", "new-file", "new-url");

        $this->assertEquals($installScript->getName(), "new-name");
        $this->assertEquals($installScript->getFile(), "new-file");
        $this->assertEquals($installScript->getUrl(), "new-url");
    }

    public function testName()
    {
        $installScript = new InstallScript();

        $this->assertNull($installScript->getName());

        $this->assertSame($installScript->setName("test-name"), $installScript);

        $this->assertEquals($installScript->getName(), "test-name");
    }

    public function testFile()
    {
        $installScript = new InstallScript();

        $this->assertNull($installScript->getFile());

        $this->assertSame($installScript->setFile("test-file"), $installScript);

        $this->assertEquals($installScript->getFile(), "test-file");
    }

    public function testUrl()
    {
        $installScript = new InstallScript();

        $this->assertNull($installScript->getUrl());

        $this->assertSame($installScript->setUrl("test-url"), $installScript);

        $this->assertEquals($installScript->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument   = new \DOMDocument();
        $installScript = new InstallScript("some-name", "some-file", "some-url");

        $domElement = $installScript->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<install_script><name>some-name</name><file>some-file</file><url>some-url</url></install_script>
");
    }

}
