<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\InstallScript;

class InstallScriptTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$installScript = new InstallScript("new-name", "new-file", "new-url");

		$this->assertNotNull($installScript);
		$this->assertEquals($installScript->getName(), "new-name");
		$this->assertEquals($installScript->getFile(), "new-file");
		$this->assertEquals($installScript->getUrl(), "new-url");
	}

	public function testName() {
		$installScript = new InstallScript();

		$this->assertNull($installScript->getName());

		$this->assertSame($installScript->setName("test-name"), $installScript);

		$this->assertEquals($installScript->getName(), "test-name");
	}

	public function testFile() {
		$installScript = new InstallScript();

		$this->assertNull($installScript->getFile());

		$this->assertSame($installScript->setFile("test-file"), $installScript);

		$this->assertEquals($installScript->getFile(), "test-file");
	}

	public function testUrl() {
		$installScript = new InstallScript();

		$this->assertNull($installScript->getUrl());

		$this->assertSame($installScript->setUrl("test-url"), $installScript);

		$this->assertEquals($installScript->getUrl(), "test-url");
	}

	public function testRender() {
		$installScript = new InstallScript("some-name", "some-file", "some-url");

		$xmlString = (string)$installScript;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<install_script><name>some-name</name><file>some-file</file><url>some-url</url></install_script>
");
	}

}
