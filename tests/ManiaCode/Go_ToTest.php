<?php

use FML\ManiaCode\Go_To;

class Go_ToTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $goTo = Go_To::create("create-link");

        $this->assertTrue($goTo instanceof Go_To);
        $this->assertEquals("create-link", $goTo->getLink());
    }

    public function testConstruct()
    {
        $goTo = new Go_To("new-link");

        $this->assertEquals("new-link", $goTo->getLink());
    }

    public function testLink()
    {
        $goTo = new Go_To();

        $this->assertNull($goTo->getLink());

        $this->assertSame($goTo, $goTo->setLink("test-link"));

        $this->assertEquals("test-link", $goTo->getLink());
    }

    public function testRender()
    {
        $goTo = new Go_To("some-link");

        $domDocument = new \DOMDocument();
        $domElement  = $goTo->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<goto><link>some-link</link></goto>
", $domDocument->saveXML());
    }

}
