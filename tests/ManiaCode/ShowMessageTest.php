<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\ShowMessage;

class ShowMessageTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$showMessage = new ShowMessage("new-message");

		$this->assertNotNull($showMessage);
		$this->assertEquals($showMessage->getMessage(), "new-message");
	}

	public function testMessage() {
		$showMessage = new ShowMessage();

		$this->assertNull($showMessage->getMessage());

		$this->assertSame($showMessage->setMessage("test-message"), $showMessage);

		$this->assertEquals($showMessage->getMessage(), "test-message");
	}

	public function testRender() {
		$showMessage = new ShowMessage("some-message");

		$xmlString = (string)$showMessage;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<show_message><message>some-message</message></show_message>
");
	}

}
