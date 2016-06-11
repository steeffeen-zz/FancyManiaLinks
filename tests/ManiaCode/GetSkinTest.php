<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\GetSkin;

class GetSkinTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $getSkin = new GetSkin("new-name", "new-file", "new-url");

        $this->assertNotNull($getSkin);
        $this->assertEquals($getSkin->getName(), "new-name");
        $this->assertEquals($getSkin->getFile(), "new-file");
        $this->assertEquals($getSkin->getUrl(), "new-url");
    }

    public function testName()
    {
        $getSkin = new GetSkin();

        $this->assertNull($getSkin->getName());

        $this->assertSame($getSkin->setName("test-name"), $getSkin);

        $this->assertEquals($getSkin->getName(), "test-name");
    }

    public function testFile()
    {
        $getSkin = new GetSkin();

        $this->assertNull($getSkin->getFile());

        $this->assertSame($getSkin->setFile("test-file"), $getSkin);

        $this->assertEquals($getSkin->getFile(), "test-file");
    }

    public function testUrl()
    {
        $getSkin = new GetSkin();

        $this->assertNull($getSkin->getUrl());

        $this->assertSame($getSkin->setUrl("test-url"), $getSkin);

        $this->assertEquals($getSkin->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $getSkin     = new GetSkin("some-name", "some-file", "some-url");

        $domElement = $getSkin->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<get_skin><name>some-name</name><file>some-file</file><url>some-url</url></get_skin>
");
    }

}
