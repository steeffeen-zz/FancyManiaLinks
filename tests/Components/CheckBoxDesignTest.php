<?php

require_once __DIR__ . '/../../autoload.php';

use FML\Components\CheckBoxDesign;
use FML\Controls\Quad;

class CheckBoxDesignTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructWithStyles()
    {
        $checkBoxDesign = new CheckBoxDesign("test-style", "test-substyle");

        $this->assertNotNull($checkBoxDesign);
        $this->assertEquals($checkBoxDesign->getStyle(), "test-style");
        $this->assertEquals($checkBoxDesign->getSubStyle(), "test-substyle");
        $this->assertNull($checkBoxDesign->getImageUrl());
    }

    public function testConstructImageUrl()
    {
        $checkBoxDesign = new CheckBoxDesign("test.url");

        $this->assertNotNull($checkBoxDesign);
        $this->assertNull($checkBoxDesign->getStyle());
        $this->assertNull($checkBoxDesign->getSubStyle());
        $this->assertEquals($checkBoxDesign->getImageUrl(), "test.url");
    }

    public function testStyle()
    {
        $checkBoxDesign = new CheckBoxDesign();

        $this->assertNull($checkBoxDesign->getStyle());

        $this->assertSame($checkBoxDesign->setStyle("some-style"), $checkBoxDesign);

        $this->assertEquals($checkBoxDesign->getStyle(), "some-style");
    }

    public function testSubStyle()
    {
        $checkBoxDesign = new CheckBoxDesign();

        $this->assertNull($checkBoxDesign->getSubStyle());

        $this->assertSame($checkBoxDesign->setSubStyle("some-substyle"), $checkBoxDesign);

        $this->assertEquals($checkBoxDesign->getSubStyle(), "some-substyle");
    }

    public function testStyles()
    {
        $checkBoxDesign = new CheckBoxDesign();

        $this->assertNull($checkBoxDesign->getStyle());
        $this->assertNull($checkBoxDesign->getSubStyle());

        $this->assertSame($checkBoxDesign->setStyles("other-style", "other-substyle"), $checkBoxDesign);

        $this->assertEquals($checkBoxDesign->getStyle(), "other-style");
        $this->assertEquals($checkBoxDesign->getSubStyle(), "other-substyle");
    }

    public function testImageUrl()
    {
        $checkBoxDesign = new CheckBoxDesign();

        $this->assertNull($checkBoxDesign->getImageUrl());

        $this->assertSame($checkBoxDesign->setImageUrl("some.url"), $checkBoxDesign);

        $this->assertEquals($checkBoxDesign->getImageUrl(), "some.url");
    }

    public function testApplyToQuadWithStyles()
    {
        $checkBoxDesign = new CheckBoxDesign("quad-style", "quad-substyle");
        $quad           = new Quad();

        $this->assertSame($checkBoxDesign->applyToQuad($quad), $checkBoxDesign);

        $this->assertEquals($quad->getStyle(), "quad-style");
        $this->assertEquals($quad->getSubStyle(), "quad-substyle");
        $this->assertNull($quad->getImageUrl());
    }

    public function testApplyToQuadWithImageUrl()
    {
        $checkBoxDesign = new CheckBoxDesign("quad.image.url");
        $quad           = new Quad();

        $this->assertSame($checkBoxDesign->applyToQuad($quad), $checkBoxDesign);

        $this->assertNull($quad->getStyle());
        $this->assertNull($quad->getSubStyle());
        $this->assertEquals($quad->getImageUrl(), "quad.image.url");
    }

    public function testDesignStringWithStyles()
    {
        $checkBoxDesign = new CheckBoxDesign("style", "substyle");

        $designString = $checkBoxDesign->getDesignString();

        $this->assertEquals($designString, "style|substyle");
    }

    public function testDesignStringWithImageUrl()
    {
        $checkBoxDesign = new CheckBoxDesign("image.url");

        $designString = $checkBoxDesign->getDesignString();

        $this->assertEquals($designString, "image.url");
    }

}
