<?php

use FML\ManiaCode\Go_To;

class Go_ToTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $goTo = Go_To::create("create-link");

        $this->assertTrue($goTo instanceof Go_To);
        $this->assertEquals($goTo->getLink(), "create-link");
    }

    public function testConstruct()
    {
        $goTo = new Go_To("new-link");

        $this->assertEquals($goTo->getLink(), "new-link");
    }

    public function testMessage()
    {
        $goTo = new Go_To();

        $this->assertNull($goTo->getLink());

        $this->assertSame($goTo->setLink("test-link"), $goTo);

        $this->assertEquals($goTo->getLink(), "test-link");
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $goTo        = new Go_To("some-link");

        $domElement = $goTo->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<goto><link>some-link</link></goto>
");
    }

}
