<?php

use FML\Controls\Label;
use FML\Script\Features\ActionTrigger;
use FML\Script\ScriptLabel;

class ActionTriggerTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control       = new Label();
        $actionTrigger = new ActionTrigger("test-name", $control, "test-label");

        $this->assertEquals("test-name", $actionTrigger->getActionName());
        $this->assertSame($control, $actionTrigger->getControl());
        $this->assertEquals("test-label", $actionTrigger->getLabelName());
    }

    public function testActionName()
    {
        $actionTrigger = new ActionTrigger();

        $this->assertNull($actionTrigger->getActionName());

        $this->assertSame($actionTrigger, $actionTrigger->setActionName("some-name"));

        $this->assertEquals("some-name", $actionTrigger->getActionName());
    }

    public function testControl()
    {
        $actionTrigger = new ActionTrigger();
        $control       = new Label();

        $this->assertNull($actionTrigger->getControl());
        $this->assertNull($control->getId());
        $this->assertNull($control->getScriptEvents());

        $this->assertSame($actionTrigger, $actionTrigger->setControl($control));

        $this->assertEquals($control, $actionTrigger->getControl());
        $this->assertNotNull($control->getId());
        $this->assertTrue($control->getScriptEvents());

        $this->assertSame($actionTrigger, $actionTrigger->setControl(null));

        $this->assertNull($actionTrigger->getControl());
    }

    public function testLabelName()
    {
        $actionTrigger = new ActionTrigger();

        $this->assertEquals(ScriptLabel::MOUSECLICK, $actionTrigger->getLabelName());

        $this->assertSame($actionTrigger, $actionTrigger->setLabelName("some-label"));

        $this->assertEquals("some-label", $actionTrigger->getLabelName());
    }

}
