<?php

use FML\XmlRpc\SMUIProperties;

class SMUIPropertiesTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $smUiProperties = SMUIProperties::create();

        $this->assertTrue($smUiProperties instanceof SMUIProperties);
    }

    public function testNoticesVisible()
    {
        $smUiProperties = new SMUIProperties();

        $this->assertNull($smUiProperties->getNoticesVisible());

        $this->assertSame($smUiProperties, $smUiProperties->setNoticesVisible(false));

        $this->assertFalse($smUiProperties->getNoticesVisible());
    }

    public function testCrosshairVisible()
    {
        $smUiProperties = new SMUIProperties();

        $this->assertNull($smUiProperties->getCrosshairVisible());

        $this->assertSame($smUiProperties, $smUiProperties->setCrosshairVisible(false));

        $this->assertFalse($smUiProperties->getCrosshairVisible());
    }

    public function testGaugesVisible()
    {
        $smUiProperties = new SMUIProperties();

        $this->assertNull($smUiProperties->getGaugesVisible());

        $this->assertSame($smUiProperties, $smUiProperties->setGaugesVisible(false));

        $this->assertFalse($smUiProperties->getGaugesVisible());
    }

    public function testConsumablesVisible()
    {
        $smUiProperties = new SMUIProperties();

        $this->assertNull($smUiProperties->getConsumablesVisible());

        $this->assertSame($smUiProperties, $smUiProperties->setConsumablesVisible(false));

        $this->assertFalse($smUiProperties->getConsumablesVisible());
    }

    public function testEndMapLadderRecapVisible()
    {
        $smUiProperties = new SMUIProperties();

        $this->assertNull($smUiProperties->getEndMapLadderRecapVisible());

        $this->assertSame($smUiProperties, $smUiProperties->setEndMapLadderRecapVisible(false));

        $this->assertFalse($smUiProperties->getEndMapLadderRecapVisible());
    }

    public function testScoresTableAltVisible()
    {
        $smUiProperties = new SMUIProperties();

        $this->assertNull($smUiProperties->getScoresTableAltVisible());

        $this->assertSame($smUiProperties, $smUiProperties->setScoresTableAltVisible(false));

        $this->assertFalse($smUiProperties->getScoresTableAltVisible());
    }

    public function testToStringWithSettings()
    {
        $smUiProperties = new SMUIProperties();
        $smUiProperties->setChatVisible(false)
                       ->setNoticesVisible(true)
                       ->setCrosshairVisible(false)
                       ->setGaugesVisible(true)
                       ->setConsumablesVisible(false)
                       ->setEndMapLadderRecapVisible(true)
                       ->setScoresTableAltVisible(false);

        $xmlString = (string)$smUiProperties;

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<ui_properties><chat visible=\"false\"/><notices visible=\"true\"/><crosshair visible=\"false\"/><gauges visible=\"true\"/><consumables visible=\"false\"/><endmap_ladder_recap visible=\"true\"/><scorestable alt_visible=\"false\"/></ui_properties>
", $xmlString);
    }

}
