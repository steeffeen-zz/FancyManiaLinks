<?php

use FML\ManiaCode\AddFavorite;

class AddFavoriteTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateWithLogin()
    {
        $addFavorite = AddFavorite::create("create-login");

        $this->assertTrue($addFavorite instanceof AddFavorite);
        $this->assertEquals($addFavorite->getLogin(), "create-login");
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());
    }

    public function testCreateWithIpAndPort()
    {
        $addFavorite = AddFavorite::create("create.ip", 420);

        $this->assertTrue($addFavorite instanceof AddFavorite);
        $this->assertNull($addFavorite->getLogin());
        $this->assertEquals($addFavorite->getIp(), "create.ip");
        $this->assertEquals($addFavorite->getPort(), 420);
    }

    public function testConstructWithLogin()
    {
        $addFavorite = new AddFavorite("new-login");

        $this->assertEquals($addFavorite->getLogin(), "new-login");
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());
    }

    public function testConstructWithIpAndPort()
    {
        $addFavorite = new AddFavorite("new.ip", 42);

        $this->assertNull($addFavorite->getLogin());
        $this->assertEquals($addFavorite->getIp(), "new.ip");
        $this->assertEquals($addFavorite->getPort(), 42);
    }

    public function testLogin()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getLogin());

        $this->assertSame($addFavorite->setLogin("test-login"), $addFavorite);

        $this->assertEquals($addFavorite->getLogin(), "test-login");
    }

    public function testIp()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getIp());

        $this->assertSame($addFavorite->setIp("test.ip"), $addFavorite);

        $this->assertEquals($addFavorite->getIp(), "test.ip");
    }

    public function testPort()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getPort());

        $this->assertSame($addFavorite->setPort(13), $addFavorite);

        $this->assertEquals($addFavorite->getPort(), 13);
    }

    public function testIpAndPort()
    {
        $addFavorite = new AddFavorite();

        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());

        $this->assertSame($addFavorite->setIp("other.ip", 1337), $addFavorite);

        $this->assertEquals($addFavorite->getIp(), "other.ip");
        $this->assertEquals($addFavorite->getPort(), 1337);
    }

    public function testLoginAndIpAndPort()
    {
        $addFavorite = new AddFavorite("first.login");

        $this->assertEquals($addFavorite->getLogin(), "first.login");
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());

        $addFavorite->setIp("evil.ip", 666);

        $this->assertNull($addFavorite->getLogin());
        $this->assertEquals($addFavorite->getIp(), "evil.ip");
        $this->assertEquals($addFavorite->getPort(), 666);

        $addFavorite->setLogin("second.login");

        $this->assertEquals($addFavorite->getLogin(), "second.login");
        $this->assertNull($addFavorite->getIp());
        $this->assertNull($addFavorite->getPort());
    }

    public function testRenderWithLogin()
    {
        $domDocument = new \DOMDocument();
        $addFavorite = new AddFavorite("some-login");

        $domElement = $addFavorite->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<add_favourite><login>some-login</login></add_favourite>
");
    }

    public function testRenderWithIpAndPort()
    {
        $domDocument = new \DOMDocument();
        $addFavorite = new AddFavorite("some.ip", 12345);

        $domElement = $addFavorite->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<add_favourite><ip>some.ip:12345</ip></add_favourite>
");
    }

}
