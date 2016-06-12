<?php

use FML\Components\ValuePicker;
use FML\Controls\Entry;
use FML\Controls\Label;

class ValuePickerTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $label       = new Label();
        $valuePicker = new ValuePicker("test-name", array("test-first", "test-second"), "test-default", $label);

        $this->assertNotNull($valuePicker);
        $this->assertEquals($valuePicker->getName(), "test-name");
        $this->assertEquals($valuePicker->getValues(), array("test-first", "test-second"));
        $this->assertEquals($valuePicker->getDefault(), "test-default");
        $this->assertSame($valuePicker->getLabel(), $label);
    }

    public function testName()
    {
        $valuePicker = new ValuePicker();

        $this->assertNull($valuePicker->getName());

        $this->assertSame($valuePicker->setName("some-name"), $valuePicker);

        $this->assertEquals($valuePicker->getName(), "some-name");
    }

    public function testValues()
    {
        $valuePicker = new ValuePicker();

        $this->assertEquals($valuePicker->getValues(), array());

        $this->assertSame($valuePicker->setValues(array("some-value", "other-value")), $valuePicker);

        $this->assertEquals($valuePicker->getValues(), array("some-value", "other-value"));
    }

    public function testDefault()
    {
        $valuePicker = new ValuePicker();

        $this->assertNull($valuePicker->getDefault());

        $this->assertSame($valuePicker->setDefault("some-default"), $valuePicker);

        $this->assertEquals($valuePicker->getDefault(), "some-default");
    }

    public function testLabel()
    {
        $valuePicker = new ValuePicker();
        $label       = new Label();

        $this->assertInstanceOf(get_class($label), $valuePicker->getLabel());

        $this->assertSame($valuePicker->setLabel($label), $valuePicker);

        $this->assertSame($valuePicker->getLabel(), $label);
    }

    public function testEntry()
    {
        $valuePicker = new ValuePicker();
        $entry       = new Entry();

        $this->assertInstanceOf(get_class($entry), $valuePicker->getEntry());

        $this->assertSame($valuePicker->setEntry($entry), $valuePicker);

        $this->assertSame($valuePicker->getEntry(), $entry);
    }

    public function testRender()
    {
        $domDocument = new \DOMDocument();
        $valuePicker = new ValuePicker();

        $expectedDomElement = $domDocument->createElement("frame");
        $expectedDomElement->appendChild($domDocument->createElement("label"));
        $expectedDomElement->appendChild($domDocument->createElement("entry"));

        $domElement = $valuePicker->render($domDocument);

        $this->assertEqualXMLStructure($expectedDomElement, $domElement);
    }

}
