<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\GetSkin;

class GetSkinTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$getSkin = new GetSkin("new-name", "new-file", "new-url");

		$this->assertNotNull($getSkin);
		$this->assertEquals($getSkin->getName(), "new-name");
		$this->assertEquals($getSkin->getFile(), "new-file");
		$this->assertEquals($getSkin->getUrl(), "new-url");
	}

	public function testName() {
		$getSkin = new GetSkin();

		$this->assertNull($getSkin->getName());

		$this->assertSame($getSkin->setName("test-name"), $getSkin);

		$this->assertEquals($getSkin->getName(), "test-name");
	}

	public function testFile() {
		$getSkin = new GetSkin();

		$this->assertNull($getSkin->getFile());

		$this->assertSame($getSkin->setFile("test-file"), $getSkin);

		$this->assertEquals($getSkin->getFile(), "test-file");
	}

	public function testUrl() {
		$getSkin = new GetSkin();

		$this->assertNull($getSkin->getUrl());

		$this->assertSame($getSkin->setUrl("test-url"), $getSkin);

		$this->assertEquals($getSkin->getUrl(), "test-url");
	}

	public function testRender() {
		$getSkin = new GetSkin("some-name", "some-file", "some-url");

		$xmlString = (string)$getSkin;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<get_skin><name>some-name</name><file>some-file</file><url>some-url</url></get_skin>
");
	}

}
