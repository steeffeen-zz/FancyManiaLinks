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
		$domDocument = new \DOMDocument();
		$addBuddy = new AddBuddy("some-login");

		$domElement = $addBuddy->render($domDocument);
		$domDocument->appendChild($domElement);

		$this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<add_buddy><login>some-login</login></add_buddy>
");
	}

}
