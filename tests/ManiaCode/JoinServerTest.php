<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\JoinServer;

class JoinServerTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructWithLogin()
    {
        $joinServer = new JoinServer("new-login");

        $this->assertNotNull($joinServer);
        $this->assertEquals($joinServer->getLogin(), "new-login");
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());
    }

    public function testConstructWithIpAndPort()
    {
        $joinServer = new JoinServer("new.ip", 42);

        $this->assertNotNull($joinServer);
        $this->assertNull($joinServer->getLogin());
        $this->assertEquals($joinServer->getIp(), "new.ip");
        $this->assertEquals($joinServer->getPort(), 42);
    }

    public function testLogin()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getLogin());

        $this->assertSame($joinServer->setLogin("test-login"), $joinServer);

        $this->assertEquals($joinServer->getLogin(), "test-login");
    }

    public function testIp()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getIp());

        $this->assertSame($joinServer->setIp("test.ip"), $joinServer);

        $this->assertEquals($joinServer->getIp(), "test.ip");
    }

    public function testPort()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getPort());

        $this->assertSame($joinServer->setPort(13), $joinServer);

        $this->assertEquals($joinServer->getPort(), 13);
    }

    public function testIpAndPort()
    {
        $joinServer = new JoinServer();

        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());

        $this->assertSame($joinServer->setIp("other.ip", 1337), $joinServer);

        $this->assertEquals($joinServer->getIp(), "other.ip");
        $this->assertEquals($joinServer->getPort(), 1337);
    }

    public function testLoginAndIpAndPort()
    {
        $joinServer = new JoinServer("first.login");

        $this->assertEquals($joinServer->getLogin(), "first.login");
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());

        $joinServer->setIp("evil.ip", 666);

        $this->assertNull($joinServer->getLogin());
        $this->assertEquals($joinServer->getIp(), "evil.ip");
        $this->assertEquals($joinServer->getPort(), 666);

        $joinServer->setLogin("second.login");

        $this->assertEquals($joinServer->getLogin(), "second.login");
        $this->assertNull($joinServer->getIp());
        $this->assertNull($joinServer->getPort());
    }

    public function testRenderWithLogin()
    {
        $domDocument = new \DOMDocument();
        $joinServer  = new JoinServer("some-login");

        $domElement = $joinServer->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<join_server><login>some-login</login></join_server>
");
    }

    public function testRenderWithIpAndPort()
    {
        $domDocument = new \DOMDocument();
        $joinServer  = new JoinServer("some.ip", 12345);

        $domElement = $joinServer->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<join_server><ip>some.ip:12345</ip></join_server>
");
    }

}
