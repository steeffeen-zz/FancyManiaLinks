<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\Go_To;

class Go_ToTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$goTo = new Go_To("new-link");

		$this->assertNotNull($goTo);
		$this->assertEquals($goTo->getLink(), "new-link");
	}

	public function testMessage() {
		$goTo = new Go_To();

		$this->assertNull($goTo->getLink());

		$this->assertSame($goTo->setLink("test-link"), $goTo);

		$this->assertEquals($goTo->getLink(), "test-link");
	}

	public function testRender() {
		$goTo = new Go_To("some-link");

		$xmlString = (string)$goTo;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<goto><link>some-link</link></goto>
");
	}

}
