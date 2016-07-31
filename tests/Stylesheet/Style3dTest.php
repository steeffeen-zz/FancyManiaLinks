<?php

use FML\Stylesheet\Style3d;

class Style3dTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $style3d = Style3d::create("create-id", "create-model");

        $this->assertTrue($style3d instanceof Style3d);
        $this->assertEquals("create-id", $style3d->getId());
        $this->assertEquals("create-model", $style3d->getModel());
    }

    public function testConstruct()
    {
        $style3d = new Style3d("new-id", "new-model");

        $this->assertEquals("new-id", $style3d->getId());
        $this->assertEquals("new-model", $style3d->getModel());
    }

    public function testId()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getId());

        $this->assertSame($style3d, $style3d->checkId());
        $this->assertNotNull($style3d->getId());

        $this->assertSame($style3d, $style3d->setId("test-id"));

        $this->assertEquals("test-id", $style3d->getId());
        $this->assertSame($style3d, $style3d->checkId());
        $this->assertEquals("test-id", $style3d->getId());
    }

    public function testModel()
    {
        $style3d = new Style3d();

        $this->assertEquals($style3d::MODEL_Box, $style3d->getModel());

        $this->assertSame($style3d, $style3d->setModel("test-model"));

        $this->assertEquals("test-model", $style3d->getModel());
    }

    public function testThickness()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getThickness());

        $this->assertSame($style3d, $style3d->setThickness(13.37));

        $this->assertEquals(13.37, $style3d->getThickness());
    }

    public function testColor()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getColor());

        $this->assertSame($style3d, $style3d->setColor("test-color"));

        $this->assertEquals("test-color", $style3d->getColor());
    }

    public function testFocusColor()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getFocusColor());

        $this->assertSame($style3d, $style3d->setFocusColor("test-focuscolor"));

        $this->assertEquals("test-focuscolor", $style3d->getFocusColor());
    }

    public function testLightColor()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getLightColor());

        $this->assertSame($style3d, $style3d->setLightColor("test-lightcolor"));

        $this->assertEquals("test-lightcolor", $style3d->getLightColor());
    }

    public function testFocusLightColor()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getFocusLightColor());

        $this->assertSame($style3d, $style3d->setFocusLightColor("test-focuslightcolor"));

        $this->assertEquals("test-focuslightcolor", $style3d->getFocusLightColor());
    }

    public function testYOffset()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getYOffset());

        $this->assertSame($style3d, $style3d->setYOffset(13.37));

        $this->assertEquals(13.37, $style3d->getYOffset());
    }

    public function testFocusYOffset()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getFocusYOffset());

        $this->assertSame($style3d, $style3d->setFocusYOffset(13.37));

        $this->assertEquals(13.37, $style3d->getFocusYOffset());
    }

    public function testZOffset()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getZOffset());

        $this->assertSame($style3d, $style3d->setZOffset(13.37));

        $this->assertEquals(13.37, $style3d->getZOffset());
    }

    public function testFocusZOffset()
    {
        $style3d = new Style3d();

        $this->assertNull($style3d->getFocusZOffset());

        $this->assertSame($style3d, $style3d->setFocusZOffset(13.37));

        $this->assertEquals(13.37, $style3d->getFocusZOffset());
    }

    public function testRender()
    {
        $style3d = new Style3d("some-id");
        $style3d->setModel("some-model")
                ->setThickness(0.5)
                ->setColor("some-color")
                ->setFocusColor("some-focuscolor")
                ->setLightColor("some-lightcolor")
                ->setFocusLightColor("some-focuslightcolor")
                ->setYOffset(1.2)
                ->setFocusYOffset(3.4)
                ->setZOffset(5.6)
                ->setFocusZOffset(7.8);

        $domDocument = new \DOMDocument();
        $domElement  = $style3d->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals("<?xml version=\"1.0\"?>
<style3d id=\"some-id\" model=\"some-model\" thickness=\"0.5\" color=\"some-color\" fcolor=\"some-focuscolor\" lightcolor=\"some-lightcolor\" flightcolor=\"some-focuslightcolor\" yoffset=\"1.2\" fyoffset=\"3.4\" zoffset=\"5.6\" fzoffset=\"7.8\"/>
", $domDocument->saveXML());
    }

}
