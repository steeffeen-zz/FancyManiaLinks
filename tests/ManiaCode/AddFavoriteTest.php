<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\AddFavorite;

class AddFavoriteTest extends \PHPUnit_Framework_TestCase {

	public function testConstructWithLogin() {
		$addFavorite = new AddFavorite("new-login");

		$this->assertNotNull($addFavorite);
		$this->assertEquals($addFavorite->getLogin(), "new-login");
		$this->assertNull($addFavorite->getIp());
		$this->assertNull($addFavorite->getPort());
	}

	public function testConstructWithIpAndPort() {
		$addFavorite = new AddFavorite("new.ip", 42);

		$this->assertNotNull($addFavorite);
		$this->assertNull($addFavorite->getLogin());
		$this->assertEquals($addFavorite->getIp(), "new.ip");
		$this->assertEquals($addFavorite->getPort(), 42);
	}

	public function testLogin() {
		$addFavorite = new AddFavorite();

		$this->assertNull($addFavorite->getLogin());

		$this->assertSame($addFavorite->setLogin("test-login"), $addFavorite);

		$this->assertEquals($addFavorite->getLogin(), "test-login");
	}

	public function testIp() {
		$addFavorite = new AddFavorite();

		$this->assertNull($addFavorite->getIp());

		$this->assertSame($addFavorite->setIp("test.ip"), $addFavorite);

		$this->assertEquals($addFavorite->getIp(), "test.ip");
	}

	public function testPort() {
		$addFavorite = new AddFavorite();

		$this->assertNull($addFavorite->getPort());

		$this->assertSame($addFavorite->setPort(13), $addFavorite);

		$this->assertEquals($addFavorite->getPort(), 13);
	}

	public function testIpAndPort() {
		$addFavorite = new AddFavorite();

		$this->assertNull($addFavorite->getIp());
		$this->assertNull($addFavorite->getPort());

		$this->assertSame($addFavorite->setIp("other.ip", 1337), $addFavorite);

		$this->assertEquals($addFavorite->getIp(), "other.ip");
		$this->assertEquals($addFavorite->getPort(), 1337);
	}

	public function testLoginAndIpAndPort() {
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

	public function testRenderWithLogin() {
		$addFavorite = new AddFavorite("some-login");

		$xmlString = (string)$addFavorite;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<add_favourite><login>some-login</login></add_favourite>
");
	}

	public function testRenderWithIpAndPort() {
		$addFavorite = new AddFavorite("some.ip", 12345);

		$xmlString = (string)$addFavorite;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<add_favourite><ip>some.ip:12345</ip></add_favourite>
");
	}

}
