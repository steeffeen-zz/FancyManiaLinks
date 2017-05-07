<?php

use FML\Components\CheckBox;
use FML\Components\CheckBoxDesign;
use FML\Controls\Entry;
use FML\Controls\Quad;
use FML\Script\Features\CheckBoxFeature;
use FML\Script\Features\ControlScript;

class CheckBoxTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad     = new Quad();
        $checkBox = new CheckBox("test-name", true, $quad);

        $this->assertNotNull($checkBox);
        $this->assertEquals("test-name", $checkBox->getName());
        $this->assertTrue($checkBox->getDefault());
        $this->assertSame($quad, $checkBox->getQuad());
    }

    public function testName()
    {
        $checkBox = new CheckBox();

        $this->assertNull($checkBox->getName());
        $this->assertNull($checkBox->getEntry()
                                   ->getName());

        $this->assertSame($checkBox, $checkBox->setName("some-name"));

        $this->assertEquals("some-name", $checkBox->getName());
        $this->assertEquals("some-name", $checkBox->getEntry()
                                                  ->getName());
    }

    public function testDefault()
    {
        $checkBox = new CheckBox();

        $this->assertNull($checkBox->getDefault());

        $this->assertSame($checkBox, $checkBox->setDefault(false));

        $this->assertFalse($checkBox->getDefault());
    }

    public function testEnabledDesign()
    {
        $checkBox      = new CheckBox();
        $enabledDesign = new CheckBoxDesign();

        $this->assertTrue($checkBox->getEnabledDesign() instanceof CheckBoxDesign);

        $this->assertSame($checkBox, $checkBox->setEnabledDesign($enabledDesign));

        $this->assertSame($enabledDesign, $checkBox->getEnabledDesign());
    }

    public function testEnabledDesignWithStyles()
    {
        $checkBox = new CheckBox();

        $this->assertSame($checkBox, $checkBox->setEnabledDesign("design.style", "design.substyle"));

        $enabledDesign = $checkBox->getEnabledDesign();

        $this->assertTrue($enabledDesign instanceof CheckBoxDesign);
        $this->assertEquals("design.style", $enabledDesign->getStyle());
        $this->assertEquals("design.substyle", $enabledDesign->getSubStyle());
    }

    public function testDisabledDesign()
    {
        $checkBox       = new CheckBox();
        $disabledDesign = new CheckBoxDesign();

        $this->assertTrue($checkBox->getDisabledDesign() instanceof CheckBoxDesign);

        $this->assertSame($checkBox, $checkBox->setDisabledDesign($disabledDesign));

        $this->assertSame($disabledDesign, $checkBox->getDisabledDesign());
    }

    public function testDisabledDesignWithStyles()
    {
        $checkBox = new CheckBox();

        $this->assertSame($checkBox, $checkBox->setDisabledDesign("design.style", "design.substyle"));

        $disabledDesign = $checkBox->getDisabledDesign();

        $this->assertTrue($disabledDesign instanceof CheckBoxDesign);
        $this->assertEquals("design.style", $disabledDesign->getStyle());
        $this->assertEquals("design.substyle", $disabledDesign->getSubStyle());
    }

    public function testQuad()
    {
        $checkBox = new CheckBox();
        $quad     = new Quad();

        $this->assertTrue($checkBox->getQuad() instanceof Quad);

        $this->assertSame($checkBox, $checkBox->setQuad($quad));

        $this->assertSame($quad, $checkBox->getQuad());
    }

    public function testEntry()
    {
        $checkBox = new CheckBox();
        $entry    = new Entry();

        $this->assertTrue($checkBox->getEntry() instanceof Entry);

        $this->assertSame($checkBox, $checkBox->setEntry($entry));

        $this->assertSame($entry, $checkBox->getEntry());
    }

    public function testScriptFeatures()
    {
        $checkBox           = new CheckBox();
        $quad               = $checkBox->getQuad();
        $entry              = $checkBox->getEntry();
        $quadScriptFeature  = new ControlScript($quad);
        $entryScriptFeature = new ControlScript($entry);

        $scriptFeatures = $checkBox->getScriptFeatures();

        $this->assertCount(3, $scriptFeatures);
        $this->assertTrue($scriptFeatures[0] instanceof CheckBoxFeature);
        $this->assertSame($quadScriptFeature, $scriptFeatures[1]);
        $this->assertSame($entryScriptFeature, $scriptFeatures[2]);
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
