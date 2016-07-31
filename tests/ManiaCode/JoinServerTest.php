<?php

use FML\ManiaCode\JoinServer;

class JoinServerTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateWithLogin()
    {
        $joinServer = JoinServer::create("create-login");

        $this->assertTrue($joinServer instanceof JoinServer);
        $this->assertEquals("create-login", $joinServer->getLogin());
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());
    }

    public function testCreateWithIpAndPort()
    {
        $joinServer = JoinServer::create("create.ip", 420);

        $this->assertTrue($joinServer instanceof JoinServer);
        $this->assertNull($joinServer->getLogin());
        $this->assertEquals("create.ip", $joinServer->getIp());
        $this->assertEquals(420, $joinServer->getPort());
    }

    public function testConstructWithLogin()
    {
        $joinServer = new JoinServer("new-login");

        $this->assertEquals("new-login", $joinServer->getLogin());
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());
    }

    public function testConstructWithIpAndPort()
    {
        $joinServer = new JoinServer("new.ip", 42);

        $this->assertNull($joinServer->getLogin());
        $this->assertEquals("new.ip", $joinServer->getIp());
        $this->assertEquals(42, $joinServer->getPort());
    }

    public function testLogin()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getLogin());

        $this->assertSame($joinServer, $joinServer->setLogin("test-login"));

        $this->assertEquals("test-login", $joinServer->getLogin());
    }

    public function testIp()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getIp());

        $this->assertSame($joinServer, $joinServer->setIp("test.ip"));

        $this->assertEquals("test.ip", $joinServer->getIp());
    }

    public function testPort()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getPort());

        $this->assertSame($joinServer, $joinServer->setPort(13));

        $this->assertEquals(13, $joinServer->getPort());
    }

    public function testIpAndPort()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());

        $this->assertSame($joinServer, $joinServer->setIp("other.ip", 1337));

        $this->assertEquals("other.ip", $joinServer->getIp());
        $this->assertEquals(1337, $joinServer->getPort());
    }

    public function testLoginAndIpAndPort()
    {
        $joinServer = new JoinServer("first.login");

        $this->assertEquals("first.login", $joinServer->getLogin());
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());

        $joinServer->setIp("evil.ip", 666);

        $this->assertNull($joinServer->getLogin());
        $this->assertEquals("evil.ip", $joinServer->getIp());
        $this->assertEquals(666, $joinServer->getPort());

        $joinServer->setLogin("second.login");

        $this->assertEquals("second.login", $joinServer->getLogin());
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());
    }

    public function testRenderWithLogin()
    {
        $joinServer = new JoinServer("some-login");

        $domDocument = new \DOMDocument();
        $domElement  = $joinServer->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<join_server><login>some-login</login></join_server>
", $domDocument->saveXML());
    }

    public function testRenderWithIpAndPort()
    {
        $joinServer = new JoinServer("some.ip", 12345);

        $domDocument = new \DOMDocument();
        $domElement  = $joinServer->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<join_server><ip>some.ip:12345</ip></join_server>
", $domDocument->saveXML());
    }

}
