<?php

use FML\ManiaCode\InstallReplay;

class InstallReplayTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $installReplay = InstallReplay::create("create-name", "create-url");

        $this->assertTrue($installReplay instanceof InstallReplay);
        $this->assertEquals("create-name", $installReplay->getName());
        $this->assertEquals("create-url", $installReplay->getUrl());
    }

    public function testConstruct()
    {
        $installReplay = new InstallReplay("new-name", "new-url");

        $this->assertEquals("new-name", $installReplay->getName());
        $this->assertEquals("new-url", $installReplay->getUrl());
    }

    public function testName()
    {
        $installReplay = new InstallReplay();

        $this->assertNull($installReplay->getName());

        $this->assertSame($installReplay, $installReplay->setName("test-name"));

        $this->assertEquals("test-name", $installReplay->getName());
    }

    public function testUrl()
    {
        $installReplay = new InstallReplay();

        $this->assertNull($installReplay->getUrl());

        $this->assertSame($installReplay, $installReplay->setUrl("test-url"));

        $this->assertEquals("test-url", $installReplay->getUrl());
    }

    public function testRender()
    {
        $installReplay = new InstallReplay("some-name", "some-url");

        $domDocument = new \DOMDocument();
        $domElement  = $installReplay->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<install_replay><name>some-name</name><url>some-url</url></install_replay>
", $domDocument->saveXML());
    }

}
