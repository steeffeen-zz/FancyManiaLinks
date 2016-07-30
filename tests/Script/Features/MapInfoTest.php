<?php

use FML\Controls\Label;
use FML\Script\Features\MapInfo;
use FML\Script\ScriptLabel;

class MapInfoTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control = new Label();
        $mapInfo = new MapInfo($control, "test-label");

        $this->assertSame($control, $mapInfo->getControl());
        $this->assertEquals("test-label", $mapInfo->getLabelName());
    }

    public function testControl()
    {
        $mapInfo = new MapInfo();
        $control = new Label();

        $this->assertNull($mapInfo->getControl());

        $this->assertSame($mapInfo, $mapInfo->setControl($control));

        $this->assertSame($control, $mapInfo->getControl());
    }

    public function testLabelName()
    {
        $mapInfo = new MapInfo();

        $this->assertEquals(ScriptLabel::MOUSECLICK, $mapInfo->getLabelName());

        $this->assertSame($mapInfo, $mapInfo->setLabelName("some-label"));

        $this->assertEquals("some-label", $mapInfo->getLabelName());
    }

}
