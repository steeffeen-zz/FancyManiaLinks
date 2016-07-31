<?php

use FML\ManiaCode\ViewReplay;

class ViewReplayTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $viewReplay = ViewReplay::create("create-name", "create-url");

        $this->assertTrue($viewReplay instanceof ViewReplay);
        $this->assertEquals("create-name", $viewReplay->getName());
        $this->assertEquals("create-url", $viewReplay->getUrl());
    }

    public function testConstruct()
    {
        $viewReplay = new ViewReplay("new-name", "new-url");

        $this->assertEquals("new-name", $viewReplay->getName());
        $this->assertEquals("new-url", $viewReplay->getUrl());
    }

    public function testName()
    {
        $viewReplay = new ViewReplay();

        $this->assertNull($viewReplay->getName());

        $this->assertSame($viewReplay, $viewReplay->setName("test-name"));

        $this->assertEquals("test-name", $viewReplay->getName());
    }

    public function testUrl()
    {
        $viewReplay = new ViewReplay();

        $this->assertNull($viewReplay->getUrl());

        $this->assertSame($viewReplay, $viewReplay->setUrl("test-url"));

        $this->assertEquals("test-url", $viewReplay->getUrl());
    }

    public function testRender()
    {
        $viewReplay = new ViewReplay("some-name", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $viewReplay->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<view_replay><name>some-name</name><url>some-url</url></view_replay>
", $domDocument->saveXML());
    }

}
