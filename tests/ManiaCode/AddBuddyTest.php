<?php

use FML\ManiaCode\AddBuddy;

class AddBuddyTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $addBuddy = AddBuddy::create("create-login");

        $this->assertTrue($addBuddy instanceof AddBuddy);
        $this->assertEquals("create-login", $addBuddy->getLogin());
    }

    public function testConstruct()
    {
        $addBuddy = new AddBuddy("new-login");

        $this->assertEquals("new-login", $addBuddy->getLogin());
    }

    public function testLogin()
    {
        $addBuddy = new AddBuddy();

        $this->assertNull($addBuddy->getLogin());

        $this->assertSame($addBuddy, $addBuddy->setLogin("test-login"));

        $this->assertEquals("test-login", $addBuddy->getLogin());
    }

    public function testRender()
    {
        $addBuddy = new AddBuddy("some-login");

        $domDocument = new \DOMDocument();
        $domElement  = $addBuddy->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<add_buddy><login>some-login</login></add_buddy>
", $domDocument->saveXML());
    }

}
