<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\PlayReplay;

class PlayReplayTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$playReplay = new PlayReplay("new-name", "new-url");

		$this->assertNotNull($playReplay);
		$this->assertEquals($playReplay->getName(), "new-name");
		$this->assertEquals($playReplay->getUrl(), "new-url");
	}

	public function testName() {
		$playReplay = new PlayReplay();

		$this->assertNull($playReplay->getName());

		$this->assertSame($playReplay->setName("test-name"), $playReplay);

		$this->assertEquals($playReplay->getName(), "test-name");
	}

	public function testUrl() {
		$playReplay = new PlayReplay();

		$this->assertNull($playReplay->getUrl());

		$this->assertSame($playReplay->setUrl("test-url"), $playReplay);

		$this->assertEquals($playReplay->getUrl(), "test-url");
	}

	public function testRender() {
		$playReplay = new PlayReplay("some-name", "some-url");

		$xmlString = (string)$playReplay;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<play_replay><name>some-name</name><url>some-url</url></play_replay>
");
	}

}
