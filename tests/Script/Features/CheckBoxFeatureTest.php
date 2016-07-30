<?php

use FML\Components\CheckBoxDesign;
use FML\Controls\Entry;
use FML\Controls\Quad;
use FML\Script\Features\CheckBoxFeature;

class CheckBoxFeatureTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad            = new Quad();
        $entry           = new Entry();
        $checkBoxFeature = new CheckBoxFeature($quad, $entry, true);
        $defaultDesign   = CheckBoxDesign::defaultDesign();

        $this->assertSame($quad, $checkBoxFeature->getQuad());
        $this->assertSame($entry, $checkBoxFeature->getEntry());
        $this->assertTrue($checkBoxFeature->getDefault());
        $this->assertEquals($defaultDesign, $checkBoxFeature->getEnabledDesign());
        $this->assertEquals($defaultDesign, $checkBoxFeature->getDisabledDesign());
    }

    public function testQuad()
    {
        $checkBoxFeature = new CheckBoxFeature();
        $quad            = new Quad();

        $this->assertNull($checkBoxFeature->getQuad());

        $this->assertSame($checkBoxFeature, $checkBoxFeature->setQuad($quad));

        $this->assertEquals($quad, $checkBoxFeature->getQuad());
        $this->assertNotNull($quad->getId());
        $this->assertTrue($quad->getScriptEvents());
    }

    public function testEntry()
    {
        $checkBoxFeature = new CheckBoxFeature();
        $entry           = new Entry();

        $this->assertNull($checkBoxFeature->getEntry());

        $this->assertSame($checkBoxFeature, $checkBoxFeature->setEntry($entry));

        $this->assertEquals($entry, $checkBoxFeature->getEntry());
        $this->assertNotNull($entry->getId());
    }

    public function testDefault()
    {
        $checkBoxFeature = new CheckBoxFeature();

        $this->assertNull($checkBoxFeature->getDefault());

        $this->assertSame($checkBoxFeature, $checkBoxFeature->setDefault(true));

        $this->assertTrue($checkBoxFeature->getDefault());
    }

    public function testEnabledDesign()
    {
        $checkBoxFeature = new CheckBoxFeature();
        $defaultDesign   = CheckBoxDesign::defaultDesign();
        $checkBoxDesign  = new CheckBoxDesign();

        $this->assertEquals($defaultDesign, $checkBoxFeature->getEnabledDesign());

        $this->assertSame($checkBoxFeature, $checkBoxFeature->setEnabledDesign($checkBoxDesign));

        $this->assertSame($checkBoxDesign, $checkBoxFeature->getEnabledDesign());
    }

    public function testDisabledDesign()
    {
        $checkBoxFeature = new CheckBoxFeature();
        $defaultDesign   = CheckBoxDesign::defaultDesign();
        $checkBoxDesign  = new CheckBoxDesign();

        $this->assertEquals($defaultDesign, $checkBoxFeature->getDisabledDesign());

        $this->assertSame($checkBoxFeature, $checkBoxFeature->setDisabledDesign($checkBoxDesign));

        $this->assertSame($checkBoxDesign, $checkBoxFeature->getDisabledDesign());
    }

}
