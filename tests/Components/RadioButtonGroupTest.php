<?php

use FML\Components\CheckBox;
use FML\Components\RadioButtonGroup;
use FML\Controls\Entry;
use FML\Script\Features\ControlScript;
use FML\Script\Features\RadioButtonGroupFeature;

class RadioButtonGroupTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $radioButtonGroup = new RadioButtonGroup("test-name");

        $this->assertNotNull($radioButtonGroup);
        $this->assertEquals("test-name", $radioButtonGroup->getName());
    }

    public function testName()
    {
        $radioButtonGroup = new RadioButtonGroup();

        $this->assertNull($radioButtonGroup->getName());
        $this->assertNull($radioButtonGroup->getEntry()
                                           ->getName());

        $this->assertSame($radioButtonGroup, $radioButtonGroup->setName("some-name"));

        $this->assertEquals("some-name", $radioButtonGroup->getName());
        $this->assertEquals("some-name", $radioButtonGroup->getEntry()
                                                          ->getName());
    }

    public function testEntry()
    {
        $radioButtonGroup = new RadioButtonGroup();
        $entry            = $radioButtonGroup->getEntry();

        $this->assertTrue($entry instanceof Entry);
        $this->assertSame($entry, $radioButtonGroup->getEntry());
        $this->assertFalse($entry->getVisible());
    }

    public function testRadioButtons()
    {
        $radioButtonGroup = new RadioButtonGroup();
        $radioButton1     = new CheckBox();
        $radioButton2     = new CheckBox();

        $this->assertEmpty($radioButtonGroup->getRadioButtons());

        $this->assertSame($radioButtonGroup, $radioButtonGroup->addRadioButton($radioButton1));

        $this->assertEquals(array($radioButton1), $radioButtonGroup->getRadioButtons());

        $this->assertSame($radioButtonGroup, $radioButtonGroup->addRadioButtons(array($radioButton1, $radioButton2)));

        $this->assertEquals(array($radioButton1, $radioButton2), $radioButtonGroup->getRadioButtons());

        $this->assertSame($radioButtonGroup, $radioButtonGroup->removeAllRadioButtons());

        $this->assertEmpty($radioButtonGroup->getRadioButtons());

        $this->assertSame($radioButtonGroup, $radioButtonGroup->setRadioButtons(array($radioButton1, $radioButton2)));

        $this->assertEquals(array($radioButton1, $radioButton2), $radioButtonGroup->getRadioButtons());
    }

    public function testScriptFeatures()
    {
        $radioButtonGroup   = new RadioButtonGroup();
        $entry              = $radioButtonGroup->getEntry();
        $entryScriptFeature = new ControlScript($entry);

        $scriptFeatures = $radioButtonGroup->getScriptFeatures();

        $this->assertCount(2, $scriptFeatures);
        $this->assertTrue($scriptFeatures[0] instanceof RadioButtonGroupFeature);
        $this->assertSame($entryScriptFeature, $scriptFeatures[1]);
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();

        $expectedDomElement = $domDocument->createElement("frame");
        $expectedDomElement->appendChild($domDocument->createElement("entry"));

        $radioButtonGroup = new RadioButtonGroup();
        $domElement       = $radioButtonGroup->render($domDocument);

        $this->assertEqualXMLStructure($expectedDomElement, $domElement);
    }

}
