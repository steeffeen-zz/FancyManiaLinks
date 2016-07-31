<?php

use FML\ManiaCode\GetSkin;

class GetSkinTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $getSkin = GetSkin::create("create-name", "create-file", "create-url");

        $this->assertTrue($getSkin instanceof GetSkin);
        $this->assertEquals("create-name", $getSkin->getName());
        $this->assertEquals("create-file", $getSkin->getFile());
        $this->assertEquals("create-url", $getSkin->getUrl());
    }

    public function testConstruct()
    {
        $getSkin = new GetSkin("new-name", "new-file", "new-url");

        $this->assertEquals("new-name", $getSkin->getName());
        $this->assertEquals("new-file", $getSkin->getFile());
        $this->assertEquals("new-url", $getSkin->getUrl());
    }

    public function testName()
    {
        $getSkin = new GetSkin();

        $this->assertNull($getSkin->getName());

        $this->assertSame($getSkin, $getSkin->setName("test-name"));

        $this->assertEquals("test-name", $getSkin->getName());
    }

    public function testFile()
    {
        $getSkin = new GetSkin();

        $this->assertNull($getSkin->getFile());

        $this->assertSame($getSkin, $getSkin->setFile("test-file"));

        $this->assertEquals("test-file", $getSkin->getFile());
    }

    public function testUrl()
    {
        $getSkin = new GetSkin();

        $this->assertNull($getSkin->getUrl());

        $this->assertSame($getSkin, $getSkin->setUrl("test-url"));

        $this->assertEquals("test-url", $getSkin->getUrl());
    }

    public function testRender()
    {
        $getSkin = new GetSkin("some-name", "some-file", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $getSkin->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<get_skin><name>some-name</name><file>some-file</file><url>some-url</url></get_skin>
", $domDocument->saveXML());
    }

}
