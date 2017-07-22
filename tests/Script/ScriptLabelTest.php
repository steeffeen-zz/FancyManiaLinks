<?php

use FML\Script\ScriptLabel;

class ScriptLabelTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $scriptLabel = new ScriptLabel("test-name", "test-text", true);

        $this->assertNotNull($scriptLabel);
        $this->assertEquals("test-name", $scriptLabel->getName());
        $this->assertEquals("test-text", $scriptLabel->getText());
        $this->assertTrue($scriptLabel->getIsolated());
    }

    public function testName()
    {
        $scriptLabel = new ScriptLabel();

        $this->assertEquals($scriptLabel::LOOP, $scriptLabel->getName());

        $this->assertSame($scriptLabel, $scriptLabel->setName("some-name"));

        $this->assertEquals("some-name", $scriptLabel->getName());
    }

    public function testText()
    {
        $scriptLabel = new ScriptLabel();

        $this->assertNull($scriptLabel->getText());

        $this->assertSame($scriptLabel, $scriptLabel->setText("some-text"));

        $this->assertEquals("some-text", $scriptLabel->getText());
    }

    public function testIsolated()
    {
        $scriptLabel = new ScriptLabel();

        $this->assertNull($scriptLabel->getIsolated());

        $this->assertSame($scriptLabel, $scriptLabel->setIsolated(true));

        $this->assertTrue($scriptLabel->getIsolated());
    }

    public function testToString()
    {
        $scriptLabel = new ScriptLabel("other-name", "other-text", true);

        $this->assertEquals("
***other-name***
***
if(True){other-text}
***
", (string)$scriptLabel);
    }

    public function testEventLabels()
    {
        $this->assertCount(5, ScriptLabel::getEventLabels());

        $this->assertTrue(ScriptLabel::isEventLabel(ScriptLabel::MOUSECLICK));
        $this->assertFalse(ScriptLabel::isEventLabel(ScriptLabel::ONINIT));
    }

}
