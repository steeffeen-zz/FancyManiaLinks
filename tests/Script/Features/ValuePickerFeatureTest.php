<?php

use FML\Controls\Entry;
use FML\Controls\Label;
use FML\Script\Features\ValuePickerFeature;

class ValuePickerFeatureTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $label              = new Label();
        $entry              = new Entry();
        $valuePickerFeature = new ValuePickerFeature($label, $entry, array("a", "b"), "b");

        $this->assertSame($label, $valuePickerFeature->getLabel());
        $this->assertSame($entry, $valuePickerFeature->getEntry());
        $this->assertEquals(array("a", "b"), $valuePickerFeature->getValues());
        $this->assertEquals("b", $valuePickerFeature->getDefault());
    }

    public function testLabel()
    {
        $valuePickerFeature = new ValuePickerFeature();
        $label              = new Label();

        $this->assertNull($valuePickerFeature->getLabel());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->setLabel($label));

        $this->assertEquals($label, $valuePickerFeature->getLabel());
        $this->assertNotNull($label->getId());
        $this->assertTrue($label->getScriptEvents());
    }

    public function testEntry()
    {
        $valuePickerFeature = new ValuePickerFeature();
        $entry              = new Entry();

        $this->assertNull($valuePickerFeature->getEntry());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->setEntry($entry));

        $this->assertEquals($entry, $valuePickerFeature->getEntry());
        $this->assertNotNull($entry->getId());
    }

    public function testValues()
    {
        $valuePickerFeature = new ValuePickerFeature();

        $this->assertEmpty($valuePickerFeature->getValues());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->addValue("value1"));

        $this->assertEquals(array("value1"), $valuePickerFeature->getValues());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->addValue("value2"));

        $this->assertEquals(array("value1", "value2"), $valuePickerFeature->getValues());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->setValues(array("value3", "value4")));

        $this->assertEquals(array("value3", "value4"), $valuePickerFeature->getValues());
    }

    public function testDefault()
    {
        $valuePickerFeature = new ValuePickerFeature();

        $this->assertNull($valuePickerFeature->getDefault());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->addValue("value1"));

        $this->assertEquals(array("value1"), $valuePickerFeature->getValues());
        $this->assertEquals("value1", $valuePickerFeature->getDefault());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->setDefault("value2"));

        $this->assertEquals(array("value1", "value2"), $valuePickerFeature->getValues());
        $this->assertEquals("value2", $valuePickerFeature->getDefault());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->addValue("value3"));
        $this->assertSame($valuePickerFeature, $valuePickerFeature->setDefault("value3"));

        $this->assertEquals(array("value1", "value2", "value3"), $valuePickerFeature->getValues());
        $this->assertEquals("value3", $valuePickerFeature->getDefault());

        $this->assertSame($valuePickerFeature, $valuePickerFeature->setDefault(null));

        $this->assertEquals(array("value1", "value2", "value3"), $valuePickerFeature->getValues());
        $this->assertEquals("value1", $valuePickerFeature->getDefault());
    }

}
