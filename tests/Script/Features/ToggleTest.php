<?php

use FML\Controls\Label;
use FML\Script\Features\Toggle;
use FML\Script\ScriptLabel;

class ToggleTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $togglingControl = new Label();
        $toggledControl  = new Label();
        $toggle          = new Toggle($togglingControl, $toggledControl, "test-label", true, false);

        $this->assertSame($togglingControl, $toggle->getTogglingControl());
        $this->assertSame($toggledControl, $toggle->getToggledControl());
        $this->assertEquals("test-label", $toggle->getLabelName());
        $this->assertTrue($toggle->getOnlyShow());
        $this->assertNull($toggle->getOnlyHide());
    }

    public function testTogglingControl()
    {
        $toggle  = new Toggle();
        $control = new Label();

        $this->assertNull($toggle->getTogglingControl());

        $this->assertSame($toggle, $toggle->setTogglingControl($control));

        $this->assertSame($control, $toggle->getTogglingControl());
    }

    public function testToggledControl()
    {
        $toggle  = new Toggle();
        $control = new Label();

        $this->assertNull($toggle->getToggledControl());

        $this->assertSame($toggle, $toggle->setToggledControl($control));

        $this->assertSame($control, $toggle->getToggledControl());
    }

    public function testLabelName()
    {
        $toggle = new Toggle();

        $this->assertEquals(ScriptLabel::MOUSECLICK, $toggle->getLabelName());

        $this->assertSame($toggle, $toggle->setLabelName("some-label"));

        $this->assertEquals("some-label", $toggle->getLabelName());
    }

    public function testOnlyShowAndOnlyHide()
    {
        $toggle = new Toggle();

        $this->assertNull($toggle->getOnlyShow());
        $this->assertNull($toggle->getOnlyHide());

        $this->assertSame($toggle, $toggle->setOnlyShow(true));

        $this->assertTrue($toggle->getOnlyShow());
        $this->assertNull($toggle->getOnlyHide());

        $this->assertSame($toggle, $toggle->setOnlyHide(true));

        $this->assertNull($toggle->getOnlyShow());
        $this->assertTrue($toggle->getOnlyHide());

        $this->assertSame($toggle, $toggle->setOnlyShow(true));

        $this->assertTrue($toggle->getOnlyShow());
        $this->assertNull($toggle->getOnlyHide());
    }

}
