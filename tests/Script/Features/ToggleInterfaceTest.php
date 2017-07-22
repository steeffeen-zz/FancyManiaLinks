<?php

use FML\Controls\Label;
use FML\Script\Features\ToggleInterface;
use FML\Script\Script;
use FML\Script\ScriptLabel;

class ToggleInterfaceTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructWithKeyName()
    {
        $control = new Label();

        $toggleInterface = new ToggleInterface($control, "TestKey", false);

        $this->assertSame($control, $toggleInterface->getControl());
        $this->assertEquals("TestKey", $toggleInterface->getKeyName());
        $this->assertNull($toggleInterface->getKeyCode());
        $this->assertFalse($toggleInterface->getRememberState());
    }

    public function testConstructWithKeyCode()
    {
        $control = new Label();

        $toggleInterface = new ToggleInterface($control, 1337, true);

        $this->assertSame($control, $toggleInterface->getControl());
        $this->assertNull($toggleInterface->getKeyName());
        $this->assertEquals(1337, $toggleInterface->getKeyCode());
        $this->assertTrue($toggleInterface->getRememberState());
    }

    public function testConstructWithoutControlWithKeyName()
    {
        $toggleInterface = new ToggleInterface("TestKey", false);

        $this->assertNull($toggleInterface->getControl());
        $this->assertEquals("TestKey", $toggleInterface->getKeyName());
        $this->assertNull($toggleInterface->getKeyCode());
        $this->assertFalse($toggleInterface->getRememberState());
    }

    public function testConstructWithoutControlWithKeyCode()
    {
        $toggleInterface = new ToggleInterface(1337, true);

        $this->assertNull($toggleInterface->getControl());
        $this->assertNull($toggleInterface->getKeyName());
        $this->assertEquals(1337, $toggleInterface->getKeyCode());
        $this->assertTrue($toggleInterface->getRememberState());
    }

    public function testControl()
    {
        $toggleInterface = new ToggleInterface();
        $control         = new Label();

        $this->assertNull($toggleInterface->getControl());

        $this->assertSame($toggleInterface, $toggleInterface->setControl($control));

        $this->assertSame($control, $toggleInterface->getControl());
    }

    public function testKeyNameAndCode()
    {
        $toggleInterface = new ToggleInterface();

        $this->assertNull($toggleInterface->getKeyName());
        $this->assertNull($toggleInterface->getKeyCode());

        $this->assertSame($toggleInterface, $toggleInterface->setKeyName("SomeKey"));

        $this->assertEquals("SomeKey", $toggleInterface->getKeyName());
        $this->assertNull($toggleInterface->getKeyCode());

        $this->assertSame($toggleInterface, $toggleInterface->setKeyCode(42));

        $this->assertNull($toggleInterface->getKeyName());
        $this->assertEquals(42, $toggleInterface->getKeyCode());

        $this->assertSame($toggleInterface, $toggleInterface->setKeyName("OtherKey"));

        $this->assertEquals("OtherKey", $toggleInterface->getKeyName());
        $this->assertNull($toggleInterface->getKeyCode());
    }

    public function testRememberState()
    {
        $toggleInterface = new ToggleInterface();

        $this->assertTrue($toggleInterface->getRememberState());

        $this->assertSame($toggleInterface, $toggleInterface->setRememberState(false));

        $this->assertFalse($toggleInterface->getRememberState());
    }

    public function testPrepareWithoutRemembering()
    {
        $control         = new Label();
        $toggleInterface = new ToggleInterface($control, "TestKey", false);
        $script          = new Script();

        $toggleInterface->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertCount(1, $genericScriptLabels);
        $keyPressLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::KeyPress, $keyPressLabel->getName());
        $this->assertNotNull($keyPressLabel->getText());
    }

    public function testPrepareWithRemembering()
    {
        $control         = new Label();
        $toggleInterface = new ToggleInterface($control, "TestKey", true);
        $script          = new Script();

        $toggleInterface->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertCount(2, $genericScriptLabels);

        $keyPressLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::KeyPress, $keyPressLabel->getName());
        $this->assertNotNull($keyPressLabel->getText());

        $initLabel = $genericScriptLabels[1];
        $this->assertEquals(ScriptLabel::OnInit, $initLabel->getName());
        $this->assertNotNull($initLabel->getText());
    }

    public function testPrepareWithoutControlWithoutRemembering()
    {
        $toggleInterface = new ToggleInterface("TestKey", false);
        $script          = new Script();

        $toggleInterface->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertCount(1, $genericScriptLabels);
        $keyPressLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::KeyPress, $keyPressLabel->getName());
        $this->assertNotNull($keyPressLabel->getText());
    }

    public function testPrepareWithoutControlWithRemembering()
    {
        $toggleInterface = new ToggleInterface("TestKey", true);
        $script          = new Script();

        $toggleInterface->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertCount(2, $genericScriptLabels);

        $keyPressLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::KeyPress, $keyPressLabel->getName());
        $this->assertNotNull($keyPressLabel->getText());

        $initLabel = $genericScriptLabels[1];
        $this->assertEquals(ScriptLabel::OnInit, $initLabel->getName());
        $this->assertNotNull($initLabel->getText());
    }

}
