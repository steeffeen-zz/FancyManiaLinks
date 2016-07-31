<?php

use FML\ManiaCode\AddFavorite;

class AddFavoriteTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateWithLogin()
    {
        $addFavorite = AddFavorite::create("create-login");

        $this->assertTrue($addFavorite instanceof AddFavorite);
        $this->assertEquals("create-login", $addFavorite->getLogin());
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());
    }

    public function testCreateWithIpAndPort()
    {
        $addFavorite = AddFavorite::create("create.ip", 420);

        $this->assertTrue($addFavorite instanceof AddFavorite);
        $this->assertNull($addFavorite->getLogin());
        $this->assertEquals("create.ip", $addFavorite->getIp());
        $this->assertEquals(420, $addFavorite->getPort());
    }

    public function testConstructWithLogin()
    {
        $addFavorite = new AddFavorite("new-login");

        $this->assertEquals("new-login", $addFavorite->getLogin());
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());
    }

    public function testConstructWithIpAndPort()
    {
        $addFavorite = new AddFavorite("new.ip", 42);

        $this->assertNull($addFavorite->getLogin());
        $this->assertEquals("new.ip", $addFavorite->getIp());
        $this->assertEquals(42, $addFavorite->getPort());
    }

    public function testLogin()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getLogin());

        $this->assertSame($addFavorite, $addFavorite->setLogin("test-login"));

        $this->assertEquals("test-login", $addFavorite->getLogin());
    }

    public function testIp()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getIp());

        $this->assertSame($addFavorite, $addFavorite->setIp("test.ip"));

        $this->assertEquals("test.ip", $addFavorite->getIp());
    }

    public function testPort()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getPort());

        $this->assertSame($addFavorite, $addFavorite->setPort(13));

        $this->assertEquals(13, $addFavorite->getPort());
    }

    public function testIpAndPort()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());

        $this->assertSame($addFavorite, $addFavorite->setIp("other.ip", 1337));

        $this->assertEquals("other.ip", $addFavorite->getIp());
        $this->assertEquals(1337, $addFavorite->getPort());
    }

    public function testLoginAndIpAndPort()
    {
        $addFavorite = new AddFavorite("first.login");

        $this->assertEquals("first.login", $addFavorite->getLogin());
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());

        $addFavorite->setIp("evil.ip", 666);

        $this->assertNull($addFavorite->getLogin());
        $this->assertEquals("evil.ip", $addFavorite->getIp());
        $this->assertEquals(666, $addFavorite->getPort());

        $addFavorite->setLogin("second.login");

        $this->assertEquals("second.login", $addFavorite->getLogin());
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());
    }

    public function testRenderWithLogin()
    {
        $addFavorite = new AddFavorite("some-login");

        $domDocument = new \DOMDocument();
        $domElement  = $addFavorite->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<add_favourite><login>some-login</login></add_favourite>
", $domDocument->saveXML());
    }

    public function testRenderWithIpAndPort()
    {
        $addFavorite = new AddFavorite("some.ip", 12345);

        $domDocument = new \DOMDocument();
        $domElement  = $addFavorite->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<add_favourite><ip>some.ip:12345</ip></add_favourite>
", $domDocument->saveXML());
    }

}
