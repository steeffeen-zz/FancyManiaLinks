<?php

use FML\Components\CheckBox;
use FML\Controls\Entry;
use FML\Script\Features\RadioButtonGroupFeature;

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

}
