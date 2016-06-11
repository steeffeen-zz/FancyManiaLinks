<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\ViewReplay;

class ViewReplayTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $viewReplay = new ViewReplay("new-name", "new-url");

        $this->assertNotNull($viewReplay);
        $this->assertEquals($viewReplay->getName(), "new-name");
        $this->assertEquals($viewReplay->getUrl(), "new-url");
    }

    public function testName()
    {
        $viewReplay = new ViewReplay();

        $this->assertNull($viewReplay->getName());

        $this->assertSame($viewReplay->setName("test-name"), $viewReplay);

        $this->assertEquals($viewReplay->getName(), "test-name");
    }

    public function testUrl()
    {
        $viewReplay = new ViewReplay();

        $this->assertNull($viewReplay->getUrl());

        $this->assertSame($viewReplay->setUrl("test-url"), $viewReplay);

        $this->assertEquals($viewReplay->getUrl(), "test-url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $viewReplay  = new ViewReplay("some-name", "some-url");

        $domElement = $viewReplay->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<view_replay><name>some-name</name><url>some-url</url></view_replay>
");
    }

}
