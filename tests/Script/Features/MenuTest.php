<?php

use FML\Controls\Label;
use FML\Script\Features\Menu;
use FML\Script\Features\MenuElement;

class MenuTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $item    = new Label();
        $control = new Label();
        $menu    = new Menu($item, $control, true);

        $elements = $menu->getElements();

        $this->assertCount(1, $elements);

        $menuElement = $elements[0];

        $this->assertTrue($menuElement instanceof MenuElement);
        $this->assertSame($item, $menuElement->getItem());
        $this->assertSame($control, $menuElement->getControl());
        $this->assertSame($menuElement, $menu->getStartElement());
    }

    public function testAddItem()
    {
        $menu    = new Menu();
        $item    = new Label();
        $control = new Label();

        $this->assertEmpty($menu->getElements());
        $this->assertNull($menu->getStartElement());

        $this->assertSame($menu, $menu->addItem($item, $control, true));

        $elements = $menu->getElements();

        $this->assertCount(1, $elements);

        $menuElement = $elements[0];

        $this->assertTrue($menuElement instanceof MenuElement);
        $this->assertSame($item, $menuElement->getItem());
        $this->assertSame($control, $menuElement->getControl());
        $this->assertSame($menuElement, $menu->getStartElement());
    }

    public function testAddElements()
    {
        $menu          = new Menu();
        $firstElement  = new MenuElement(new Label(), new Label());
        $secondElement = new MenuElement(new Label(), new Label());

        $this->assertEmpty($menu->getElements());
        $this->assertNull($menu->getStartElement());

        $this->assertSame($menu, $menu->addElement($firstElement));

        $this->assertCount(1, $menu->getElements());
        $this->assertEquals(array($firstElement), $menu->getElements());
        $this->assertNull($menu->getStartElement());
        $this->assertFalse($firstElement->getControl()
                                        ->getVisible());

        $this->assertSame($menu, $menu->addElement($secondElement, true));

        $this->assertCount(2, $menu->getElements());
        $this->assertEquals(array($firstElement, $secondElement), $menu->getElements());
        $this->assertSame($secondElement, $menu->getStartElement());
        $this->assertTrue($secondElement->getControl()
                                        ->getVisible());

        $this->assertSame($menu, $menu->addElement($firstElement));

        $this->assertCount(2, $menu->getElements());
        $this->assertEquals(array($firstElement, $secondElement), $menu->getElements());
        $this->assertSame($secondElement, $menu->getStartElement());
    }

    public function testStartElement()
    {
        $menu        = new Menu();
        $menuElement = new MenuElement();

        $this->assertEmpty($menu->getElements());
        $this->assertNull($menu->getStartElement());

        $this->assertSame($menu, $menu->setStartElement($menuElement));

        $this->assertEquals(array($menuElement), $menu->getElements());
        $this->assertSame($menuElement, $menu->getStartElement());

        $this->assertSame($menu, $menu->setStartElement(null));

        $this->assertEquals(array($menuElement), $menu->getElements());
        $this->assertNull($menu->getStartElement());
    }

}
