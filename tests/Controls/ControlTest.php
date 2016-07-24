<?php

use FML\Controls\Control;

class ControlStub extends Control
{

    public function getTagName()
    {
        return "control";
    }

    public function getManiaScriptClass()
    {
        return "CMlControl";
    }

}

class ControlTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $control = ControlStub::create("test.control");

        $this->assertTrue($control instanceof Control);
        $this->assertEquals("test.control", $control->getId());
    }

    public function testX()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getX());

        $this->assertSame($control, $control->setX(13.37));

        $this->assertEquals(13.37, $control->getX());
    }

    public function testY()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getY());

        $this->assertSame($control, $control->setY(13.37));

        $this->assertEquals(13.37, $control->getY());
    }

    public function testZ()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getZ());

        $this->assertSame($control, $control->setZ(13.37));

        $this->assertEquals(13.37, $control->getZ());
    }

    public function testPosition()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getX());
        $this->assertEquals(0., $control->getY());
        $this->assertEquals(0., $control->getZ());

        $this->assertSame($control, $control->setPosition(1.2, 3.4, 5.6));

        $this->assertEquals(1.2, $control->getX());
        $this->assertEquals(3.4, $control->getY());
        $this->assertEquals(5.6, $control->getZ());
    }

    public function testWidth()
    {
        $control = new ControlStub();

        $this->assertEquals(-1., $control->getWidth());

        $this->assertSame($control, $control->setWidth(13.37));

        $this->assertEquals(13.37, $control->getWidth());
    }

    public function testHeight()
    {
        $control = new ControlStub();

        $this->assertEquals(-1., $control->getHeight());

        $this->assertSame($control, $control->setHeight(13.37));

        $this->assertEquals(13.37, $control->getHeight());
    }

    public function testSize()
    {
        $control = new ControlStub();

        $this->assertEquals(-1., $control->getWidth());
        $this->assertEquals(-1., $control->getHeight());

        $this->assertSame($control, $control->setSize(12.34, 56.78));

        $this->assertEquals(12.34, $control->getWidth());
        $this->assertEquals(56.78, $control->getHeight());
    }

    public function testHorizontalAlign()
    {
        $control = new ControlStub();

        $this->assertEquals($control::CENTER, $control->getHorizontalAlign());

        $this->assertSame($control, $control->setHorizontalAlign("test-align"));

        $this->assertEquals("test-align", $control->getHorizontalAlign());
    }

    public function testVerticalAlign()
    {
        $control = new ControlStub();

        $this->assertEquals($control::CENTER2, $control->getVerticalAlign());

        $this->assertSame($control, $control->setVerticalAlign("test-align"));

        $this->assertEquals("test-align", $control->getVerticalAlign());
    }

    public function testAlign()
    {
        $control = new ControlStub();

        $this->assertEquals($control::CENTER, $control->getHorizontalAlign());
        $this->assertEquals($control::CENTER2, $control->getVerticalAlign());

        $this->assertSame($control, $control->setAlign("test-halign", "test-valign"));

        $this->assertEquals("test-halign", $control->getHorizontalAlign());
        $this->assertEquals("test-valign", $control->getVerticalAlign());

        $this->assertSame($control, $control->centerAlign());

        $this->assertEquals($control::CENTER, $control->getHorizontalAlign());
        $this->assertEquals($control::CENTER2, $control->getVerticalAlign());

        $this->assertSame($control, $control->clearAlign());

        $this->assertNull($control->getHorizontalAlign());
        $this->assertNull($control->getVerticalAlign());
    }

    public function testScale()
    {
        $control = new ControlStub();

        $this->assertEquals(1., $control->getScale());

        $this->assertSame($control, $control->setScale(13.37));

        $this->assertEquals(13.37, $control->getScale());
    }

    public function testVisible()
    {
        $control = new ControlStub();

        $this->assertTrue($control->getVisible());

        $this->assertSame($control, $control->setVisible(false));

        $this->assertFalse($control->getVisible());
    }

    public function testRotation()
    {
        $control = new ControlStub();

        $this->assertEquals(0., $control->getRotation());

        $this->assertSame($control, $control->setRotation(13.37));

        $this->assertEquals(13.37, $control->getRotation());
    }

    public function testClasses()
    {
        $control = new ControlStub();

        $this->assertEmpty($control->getClasses());

        $this->assertSame($control, $control->addClass("test-class1"));

        $this->assertEquals(array("test-class1"), $control->getClasses());

        $this->assertSame($control, $control->addClasses(array("test-class1", "test-class2")));

        $this->assertEquals(array("test-class1", "test-class2"), $control->getClasses());

        $this->assertSame($control, $control->removeAllClasses());

        $this->assertEmpty($control->getClasses());
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $control     = new ControlStub("some.control");
        $control->clearAlign()
                ->setPosition(9.8, 7.6, 5.4)
                ->setSize(98.76, 54.32)
                ->setAlign("some-halign", "some-valign")
                ->setScale(0.5)
                ->setVisible(false)
                ->setRotation(0.3)
                ->addClasses(array("some-class1", "some-class2"));

        $domElement = $control->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<control id=\"some.control\" posn=\"9.8 7.6 5.4\" sizen=\"98.76 54.32\" halign=\"some-halign\" valign=\"some-valign\" scale=\"0.5\" hidden=\"1\" rot=\"0.3\" class=\"some-class1 some-class2\"/>
", $domDocument->saveXML());
    }

}
