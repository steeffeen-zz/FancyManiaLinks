<?php

use FML\Elements\Including;

class IncludingTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $including = Including::create("test.url");

        $this->assertNotNull($including);
        $this->assertEquals($including->getUrl(), "test.url");
    }

    public function testConstruct()
    {
        $including = new Including("some.url");

        $this->assertEquals($including->getUrl(), "some.url");
    }

    public function testUrl()
    {
        $including = new Including();

        $this->assertNull($including->getUrl());

        $this->assertSame($including->setUrl("other.url"), $including);

        $this->assertEquals($including->getUrl(), "other.url");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $including   = new Including("include.url");

        $domElement = $including->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<include url=\"include.url\"/>
");
    }

}
