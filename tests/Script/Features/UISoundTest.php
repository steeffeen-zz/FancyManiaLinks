<?php

use FML\Controls\Label;
use FML\Script\Features\UISound;
use FML\Script\ScriptLabel;

class UISoundTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control = new Label();
        $uiSound = new UISound("test-name", $control, 13, "test-label");

        $this->assertEquals("test-name", $uiSound->getSoundName());
        $this->assertSame($control, $uiSound->getControl());
        $this->assertEquals(13, $uiSound->getVariant());
        $this->assertEquals("test-label", $uiSound->getLabelName());
    }

    public function testSoundName()
    {
        $uiSound = new UISound();

        $this->assertNull($uiSound->getSoundName());

        $this->assertSame($uiSound, $uiSound->setSoundName("some-name"));

        $this->assertSame("some-name", $uiSound->getSoundName());
    }

    public function testControl()
    {
        $uiSound = new UISound();
        $control = new Label();

        $this->assertNull($uiSound->getControl());

        $this->assertSame($uiSound, $uiSound->setControl($control));

        $this->assertSame($control, $uiSound->getControl());

        $this->assertSame($uiSound, $uiSound->setControl(null));

        $this->assertNull($uiSound->getControl());
    }

    public function testVariant()
    {
        $uiSound = new UISound();

        $this->assertEquals(0, $uiSound->getVariant());

        $this->assertSame($uiSound, $uiSound->setVariant(42));

        $this->assertEquals(42, $uiSound->getVariant());
    }

    public function testLabelName()
    {
        $uiSound = new UISound();

        $this->assertEquals(ScriptLabel::MOUSECLICK, $uiSound->getLabelName());

        $this->assertSame($uiSound, $uiSound->setLabelName("some-label"));

        $this->assertEquals("some-label", $uiSound->getLabelName());
    }

    public function testVolume()
    {
        $uiSound = new UISound();

        $this->assertEquals(1., $uiSound->getVolume());

        $this->assertSame($uiSound, $uiSound->setVolume(0.3));

        $this->assertEquals(0.3, $uiSound->getVolume());
    }

}
