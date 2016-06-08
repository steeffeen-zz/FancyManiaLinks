<?php

require_once __DIR__ . '/../../autoload.php';

use FML\ManiaCode\ViewReplay;

class ViewReplayTest extends \PHPUnit_Framework_TestCase {

	public function testConstruct() {
		$viewReplay = new ViewReplay("new-name", "new-url");

		$this->assertNotNull($viewReplay);
		$this->assertEquals($viewReplay->getName(), "new-name");
		$this->assertEquals($viewReplay->getUrl(), "new-url");
	}

	public function testName() {
		$viewReplay = new ViewReplay();

		$this->assertNull($viewReplay->getName());

		$this->assertSame($viewReplay->setName("test-name"), $viewReplay);

		$this->assertEquals($viewReplay->getName(), "test-name");
	}

	public function testUrl() {
		$viewReplay = new ViewReplay();

		$this->assertNull($viewReplay->getUrl());

		$this->assertSame($viewReplay->setUrl("test-url"), $viewReplay);

		$this->assertEquals($viewReplay->getUrl(), "test-url");
	}

	public function testRender() {
		$viewReplay = new ViewReplay("some-name", "some-url");

		$xmlString = (string)$viewReplay;

		$this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<view_replay><name>some-name</name><url>some-url</url></view_replay>
");
	}

}
