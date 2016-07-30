<?php

use FML\Controls\Label;
use FML\Script\Features\Tooltip;

class TooltipTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $hoverControl   = new Label();
        $tooltipControl = new Label();
        $tooltip        = new Tooltip($hoverControl, $tooltipControl, true, true, "test-text");

        $this->assertSame($hoverControl, $tooltip->getHoverControl());
        $this->assertSame($tooltipControl, $tooltip->getTooltipControl());
        $this->assertTrue($tooltip->getStayOnClick());
        $this->assertTrue($tooltip->getInvert());
        $this->assertEquals("test-text", $tooltip->getText());
    }

    public function testHoverControl()
    {
        $tooltip = new Tooltip();
        $control = new Label();

        $this->assertNull($tooltip->getHoverControl());

        $this->assertSame($tooltip, $tooltip->setHoverControl($control));

        $this->assertSame($control, $tooltip->getHoverControl());
    }

    public function testTooltipControl()
    {
        $tooltip = new Tooltip();
        $control = new Label();

        $this->assertNull($tooltip->getTooltipControl());

        $this->assertSame($tooltip, $tooltip->setTooltipControl($control));

        $this->assertSame($control, $tooltip->getTooltipControl());
    }

    public function testStayOnClick()
    {
        $tooltip = new Tooltip();

        $this->assertNull($tooltip->getStayOnClick());

        $this->assertSame($tooltip, $tooltip->setStayOnClick(true));

        $this->assertTrue($tooltip->getStayOnClick());
    }

    public function testInvert()
    {
        $tooltip = new Tooltip();

        $this->assertNull($tooltip->getInvert());

        $this->assertSame($tooltip, $tooltip->setInvert(true));

        $this->assertTrue($tooltip->getInvert());
    }

}
