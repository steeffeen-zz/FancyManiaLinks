<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\InstallReplay;

class InstallReplayTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$installReplay = new InstallReplay("new-name", "new-url");

		$this->assertNotNull($installReplay);
		$this->assertEquals($installReplay->getName(), "new-name");
		$this->assertEquals($installReplay->getUrl(), "new-url");
	}

	public function testName() {
		$installReplay = new InstallReplay();

		$this->assertNull($installReplay->getName());

		$this->assertSame($installReplay->setName("test-name"), $installReplay);

		$this->assertEquals($installReplay->getName(), "test-name");
	}

	public function testUrl() {
		$installReplay = new InstallReplay();

		$this->assertNull($installReplay->getUrl());

		$this->assertSame($installReplay->setUrl("test-url"), $installReplay);

		$this->assertEquals($installReplay->getUrl(), "test-url");
	}

	public function testRender() {
		$domDocument = new \DOMDocument();
		$installReplay = new InstallReplay("some-name", "some-url");

		$domElement = $installReplay->render($domDocument);
		$domDocument->appendChild($domElement);

		$this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<install_replay><name>some-name</name><url>some-url</url></install_replay>
");
	}

}
