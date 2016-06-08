<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\AddBuddy;

class AddBuddyTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$addBuddy = new AddBuddy("new-login");

		$this->assertNotNull($addBuddy);
		$this->assertEquals($addBuddy->getLogin(), "new-login");
	}

	public function testLogin() {
		$addBuddy = new AddBuddy();

		$this->assertNull($addBuddy->getLogin());

		$this->assertSame($addBuddy->setLogin("test-login"), $addBuddy);

		$this->assertEquals($addBuddy->getLogin(), "test-login");
	}

	public function testRender() {
		$addBuddy = new AddBuddy("some-login");

		$xmlString = (string)$addBuddy;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<add_buddy><login>some-login</login></add_buddy>
");
	}

}
