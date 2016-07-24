<?php

use FML\Controls\Label;
use FML\Script\Features\PlayerProfile;
use FML\Script\ScriptLabel;

class PlayerProfileTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $control       = new Label();
        $playerProfile = new PlayerProfile("test-login", $control, "test-label");

        $this->assertEquals("test-login", $playerProfile->getLogin());
        $this->assertSame($control, $playerProfile->getControl());
        $this->assertEquals("test-label", $playerProfile->getLabelName());
    }

    public function testLogin()
    {
        $playerProfile = new PlayerProfile();

        $this->assertNull($playerProfile->getLogin());

        $this->assertSame($playerProfile, $playerProfile->setLogin("some-login"));

        $this->assertEquals("some-login", $playerProfile->getLogin());
    }

    public function testControl()
    {
        $playerProfile = new PlayerProfile();
        $control       = new Label();

        $this->assertNull($playerProfile->getControl());

        $this->assertSame($playerProfile, $playerProfile->setControl($control));

        $this->assertSame($control, $playerProfile->getControl());
    }

    public function testLabelName()
    {
        $playerProfile = new PlayerProfile();

        $this->assertEquals(ScriptLabel::MOUSECLICK, $playerProfile->getLabelName());

        $this->assertSame($playerProfile, $playerProfile->setLabelName("some-label"));

        $this->assertEquals("some-label", $playerProfile->getLabelName());
    }

}
