<?php

use FML\Controls\Label;
use FML\Script\Features\Clock;

class ClockTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $label = new Label();
        $clock = new Clock($label, false, true);

        $this->assertSame($label, $clock->getLabel());
        $this->assertFalse($clock->getShowSeconds());
        $this->assertTrue($clock->getShowFullDate());
    }

    public function testLabel()
    {
        $clock = new Clock();
        $label = new Label();

        $this->assertNull($clock->getLabel());
        $this->assertNull($label->getId());

        $this->assertSame($clock, $clock->setLabel($label));

        $this->assertSame($label, $clock->getLabel());
        $this->assertNotNull($label->getId());
    }

    public function testShowSeconds()
    {
        $clock = new Clock();

        $this->assertTrue($clock->getShowSeconds());

        $this->assertSame($clock, $clock->setShowSeconds(false));

        $this->assertFalse($clock->getShowSeconds());
    }

    public function testShowFullDate()
    {
        $clock = new Clock();

        $this->assertFalse($clock->getShowFullDate());

        $this->assertSame($clock, $clock->setShowFullDate(true));

        $this->assertTrue($clock->getShowFullDate());
    }

}
