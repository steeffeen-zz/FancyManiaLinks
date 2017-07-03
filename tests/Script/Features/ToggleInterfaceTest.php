<?php

use FML\Script\Features\ToggleInterface;
use FML\Script\Script;
use FML\Script\ScriptLabel;

class ToggleInterfaceTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructWithKeyName()
    {
        $toggleInterface = new ToggleInterface("TestKey", false);

        $this->assertEquals("TestKey", $toggleInterface->getKeyName());
        $this->assertNull($toggleInterface->getKeyCode());
        $this->assertFalse($toggleInterface->getRememberState());
    }

    public function testConstructWithKeyCode()
    {
        $toggleInterface = new ToggleInterface(1337, true);

        $this->assertNull($toggleInterface->getKeyName());
        $this->assertEquals(1337, $toggleInterface->getKeyCode());
        $this->assertTrue($toggleInterface->getRememberState());
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
        $toggleInterface = new ToggleInterface("TestKey", false);
        $script          = new Script();

        $toggleInterface->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertCount(1, $genericScriptLabels);
        $keyPressLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::KEYPRESS, $keyPressLabel->getName());
        $this->assertNotNull($keyPressLabel->getText());
    }

    public function testPrepareWithRemembering()
    {
        $toggleInterface = new ToggleInterface("TestKey", true);
        $script          = new Script();

        $toggleInterface->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertCount(2, $genericScriptLabels);

        $keyPressLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::KEYPRESS, $keyPressLabel->getName());
        $this->assertNotNull($keyPressLabel->getText());

        $initLabel = $genericScriptLabels[1];
        $this->assertEquals(ScriptLabel::ONINIT, $initLabel->getName());
        $this->assertNotNull($initLabel->getText());
    }

}
