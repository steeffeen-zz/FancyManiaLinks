<?php

use FML\Components\CheckBox;
use FML\Components\CheckBoxDesign;
use FML\Controls\Entry;
use FML\Controls\Quad;

class CheckBoxTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad     = new Quad();
        $checkBox = new CheckBox("test-name", true, $quad);

        $this->assertNotNull($checkBox);
        $this->assertEquals($checkBox->getName(), "test-name");
        $this->assertTrue($checkBox->getDefault());
        $this->assertSame($checkBox->getQuad(), $quad);
    }

    public function testName()
    {
        $checkBox = new CheckBox();

        $this->assertNull($checkBox->getName());

        $this->assertSame($checkBox->setName("some-name"), $checkBox);

        $this->assertEquals($checkBox->getName(), "some-name");
    }

    public function testDefault()
    {
        $checkBox = new CheckBox();

        $this->assertNull($checkBox->getDefault());

        $this->assertSame($checkBox->setDefault(false), $checkBox);

        $this->assertFalse($checkBox->getDefault());
    }

    public function testEnabledDesign()
    {
        $checkBox      = new CheckBox();
        $enabledDesign = new CheckBoxDesign();

        $this->assertInstanceOf(CheckBoxDesign::class, $checkBox->getEnabledDesign());

        $this->assertSame($checkBox->setEnabledDesign($enabledDesign), $checkBox);

        $this->assertSame($checkBox->getEnabledDesign(), $enabledDesign);
    }

    public function testEnabledDesignWithStyles()
    {
        $checkBox = new CheckBox();

        $this->assertSame($checkBox->setEnabledDesign("design.style", "design.substyle"), $checkBox);

        $enabledDesign = $checkBox->getEnabledDesign();

        $this->assertInstanceOf(CheckBoxDesign::class, $enabledDesign);
        $this->assertEquals($enabledDesign->getStyle(), "design.style");
        $this->assertEquals($enabledDesign->getSubStyle(), "design.substyle");
    }

    public function testDisabledDesign()
    {
        $checkBox       = new CheckBox();
        $disabledDesign = new CheckBoxDesign();

        $this->assertInstanceOf(CheckBoxDesign::class, $checkBox->getDisabledDesign());

        $this->assertSame($checkBox->setDisabledDesign($disabledDesign), $checkBox);

        $this->assertSame($checkBox->getDisabledDesign(), $disabledDesign);
    }

    public function testDisabledDesignWithStyles()
    {
        $checkBox = new CheckBox();

        $this->assertSame($checkBox->setDisabledDesign("design.style", "design.substyle"), $checkBox);

        $disabledDesign = $checkBox->getDisabledDesign();

        $this->assertInstanceOf(CheckBoxDesign::class, $disabledDesign);
        $this->assertEquals($disabledDesign->getStyle(), "design.style");
        $this->assertEquals($disabledDesign->getSubStyle(), "design.substyle");
    }

    public function testQuad()
    {
        $checkBox = new CheckBox();
        $quad     = new Quad();

        $this->assertInstanceOf(Quad::class, $checkBox->getQuad());

        $this->assertSame($checkBox->setQuad($quad), $checkBox);

        $this->assertSame($checkBox->getQuad(), $quad);
    }

    public function testEntry()
    {
        $checkBox = new CheckBox();
        $entry    = new Entry();

        $this->assertInstanceOf(Entry::class, $checkBox->getEntry());

        $this->assertSame($checkBox->setEntry($entry), $checkBox);

        $this->assertSame($checkBox->getEntry(), $entry);
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $checkBox    = new CheckBox();

        $expectedDomElement = $domDocument->createElement("frame");
        $expectedDomElement->appendChild($domDocument->createElement("quad"));
        $expectedDomElement->appendChild($domDocument->createElement("entry"));

        $domElement = $checkBox->render($domDocument);

        $this->assertEqualXMLStructure($expectedDomElement, $domElement);
    }

}
