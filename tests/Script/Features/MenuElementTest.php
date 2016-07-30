<?php

use FML\Controls\Label;
use FML\Script\Features\MenuElement;

class MenuElementTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $item        = new Label();
        $control     = new Label();
        $menuElement = new MenuElement($item, $control);

        $this->assertSame($item, $menuElement->getItem());
        $this->assertSame($control, $menuElement->getControl());
    }

    public function testItem()
    {
        $menuElement = new MenuElement();
        $item        = new Label();

        $this->assertNull($menuElement->getItem());

        $this->assertSame($menuElement, $menuElement->setItem($item));

        $this->assertSame($item, $menuElement->getItem());
    }

    public function testControl()
    {
        $menuElement = new MenuElement();
        $control     = new Label();

        $this->assertNull($menuElement->getControl());

        $this->assertSame($menuElement, $menuElement->setControl($control));

        $this->assertSame($control, $menuElement->getControl());
    }

}
