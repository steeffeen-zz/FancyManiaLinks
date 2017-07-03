<?php

use FML\Components\CheckBox;
use FML\Controls\Entry;
use FML\Controls\Quad;
use FML\Script\Features\RadioButtonGroupFeature;
use FML\Script\Script;
use FML\Script\ScriptLabel;

class RadioButtonGroupFeatureTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $entry                   = new Entry();
        $radioButtonGroupFeature = new RadioButtonGroupFeature($entry);

        $this->assertSame($entry, $radioButtonGroupFeature->getEntry());
    }

    public function testEntry()
    {
        $radioButtonGroupFeature = new RadioButtonGroupFeature();
        $entry                   = new Entry();

        $this->assertNull($radioButtonGroupFeature->getEntry());

        $this->assertSame($radioButtonGroupFeature, $radioButtonGroupFeature->setEntry($entry));

        $this->assertSame($entry, $radioButtonGroupFeature->getEntry());
        $this->assertNotNull($entry->getId());
    }

    public function testRadioButtons()
    {
        $radioButtonGroupFeature = new RadioButtonGroupFeature();
        $radioButton1            = new CheckBox();
        $radioButton2            = new CheckBox();

        $this->assertEmpty($radioButtonGroupFeature->getRadioButtons());

        $this->assertSame($radioButtonGroupFeature, $radioButtonGroupFeature->addRadioButton($radioButton1));

        $this->assertEquals(array($radioButton1), $radioButtonGroupFeature->getRadioButtons());

        $this->assertSame($radioButtonGroupFeature, $radioButtonGroupFeature->addRadioButtons(array($radioButton1, $radioButton2)));

        $this->assertEquals(array($radioButton1, $radioButton2), $radioButtonGroupFeature->getRadioButtons());

        $this->assertSame($radioButtonGroupFeature, $radioButtonGroupFeature->removeAllRadioButtons());

        $this->assertEmpty($radioButtonGroupFeature->getRadioButtons());

        $this->assertSame($radioButtonGroupFeature, $radioButtonGroupFeature->setRadioButtons(array($radioButton1, $radioButton2)));

        $this->assertEquals(array($radioButton1, $radioButton2), $radioButtonGroupFeature->getRadioButtons());
    }

    public function testPrepareWithoutRadioButtons()
    {
        $radioButtonGroupFeature = new RadioButtonGroupFeature();
        $script                  = new Script();

        $radioButtonGroupFeature->prepare($script);

        $this->assertEmpty($script->getScriptConstants());
        $this->assertEmpty($script->getScriptFunctions());
        $this->assertEmpty($script->getGenericScriptLabels());
    }

    public function testPrepareWithRadioButtons()
    {
        $entry                   = new Entry("TestEntry");
        $quad                    = new Quad("TestQuad");
        $radioButton             = new CheckBox("TestRadioButton", false, $quad);
        $radioButtonGroupFeature = new RadioButtonGroupFeature();
        $radioButtonGroupFeature->setEntry($entry)
                                ->addRadioButton($radioButton);
        $script = new Script();

        $radioButtonGroupFeature->prepare($script);

        $scriptConstants = $script->getScriptConstants();
        $this->assertNotEmpty($scriptConstants);
        $radioButtonIdsConstant = $scriptConstants[0];
        $this->assertEquals(RadioButtonGroupFeature::CONSTANT_RADIO_BUTTON_IDS_PREFIX . "TestEntry", $radioButtonIdsConstant->getName());
        $this->assertEquals(array("TestRadioButton" => "TestQuad"), $radioButtonIdsConstant->getValue());

        $scriptFunctions = $script->getScriptFunctions();
        $this->assertNotEmpty($scriptFunctions);
        $radioButtonClickFunction = $scriptFunctions[0];
        $this->assertEquals(RadioButtonGroupFeature::FUNCTION_ON_RADIO_BUTTON_CLICK, $radioButtonClickFunction->getName());
        $this->assertNotNull($radioButtonClickFunction->getText());

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $mouseClickLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::MOUSECLICK2, $mouseClickLabel->getName());
        $this->assertNotNull($mouseClickLabel->getText());
    }

}
