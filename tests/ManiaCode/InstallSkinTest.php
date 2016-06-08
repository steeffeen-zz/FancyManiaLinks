<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\InstallSkin;

class InstallSkinTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$installSkin = new InstallSkin("new-name", "new-file", "new-url");

		$this->assertNotNull($installSkin);
		$this->assertEquals($installSkin->getName(), "new-name");
		$this->assertEquals($installSkin->getFile(), "new-file");
		$this->assertEquals($installSkin->getUrl(), "new-url");
	}

	public function testName() {
		$installSkin = new InstallSkin();

		$this->assertNull($installSkin->getName());

		$this->assertSame($installSkin->setName("test-name"), $installSkin);

		$this->assertEquals($installSkin->getName(), "test-name");
	}

	public function testFile() {
		$installSkin = new InstallSkin();

		$this->assertNull($installSkin->getFile());

		$this->assertSame($installSkin->setFile("test-file"), $installSkin);

		$this->assertEquals($installSkin->getFile(), "test-file");
	}

	public function testUrl() {
		$installSkin = new InstallSkin();

		$this->assertNull($installSkin->getUrl());

		$this->assertSame($installSkin->setUrl("test-url"), $installSkin);

		$this->assertEquals($installSkin->getUrl(), "test-url");
	}

	public function testRender() {
		$installSkin = new InstallSkin("some-name", "some-file", "some-url");

		$xmlString = (string)$installSkin;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<install_skin><name>some-name</name><file>some-file</file><url>some-url</url></install_skin>
");
	}

}
