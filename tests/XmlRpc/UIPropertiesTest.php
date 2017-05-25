<?php

use FML\XmlRpc\UIProperties;

class UIPropertiesStub extends UIProperties
{
}

class UIPropertiesTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $uiProperties = UIPropertiesStub::create();

        $this->assertTrue($uiProperties instanceof UIPropertiesStub);
    }

    public function testChatVisible()
    {
        $uiProperties = new UIPropertiesStub();

        $this->assertNull($uiProperties->getChatVisible());

        $this->assertSame($uiProperties, $uiProperties->setChatVisible(false));

        $this->assertFalse($uiProperties->getChatVisible());
    }

    public function testChatAvatarVisible()
    {
        $uiProperties = new UIPropertiesStub();

        $this->assertNull($uiProperties->getChatAvatarVisible());

        $this->assertSame($uiProperties, $uiProperties->setChatAvatarVisible(false));

        $this->assertFalse($uiProperties->getChatAvatarVisible());
    }

    public function testMapInfoVisible()
    {
        $uiProperties = new UIPropertiesStub();

        $this->assertNull($uiProperties->getMapInfoVisible());

        $this->assertSame($uiProperties, $uiProperties->setMapInfoVisible(false));

        $this->assertFalse($uiProperties->getMapInfoVisible());
    }

    public function testCountdownVisible()
    {
        $uiProperties = new UIPropertiesStub();

        $this->assertNull($uiProperties->getCountdownVisible());

        $this->assertSame($uiProperties, $uiProperties->setCountdownVisible(false));

        $this->assertFalse($uiProperties->getCountdownVisible());
    }

    public function testGoVisible()
    {
        $uiProperties = new UIPropertiesStub();

        $this->assertNull($uiProperties->getGoVisible());

        $this->assertSame($uiProperties, $uiProperties->setGoVisible(false));

        $this->assertFalse($uiProperties->getGoVisible());
    }

    public function testRenderStandaloneWithSomeSettings()
    {
        $uiProperties = new UIPropertiesStub();
        $uiProperties->setChatVisible(false)
                     ->setMapInfoVisible(false)
                     ->setCountdownVisible(true);

        $domDocument = $uiProperties->renderStandalone();

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<ui_properties><chat visible=\"false\"/><map_info visible=\"false\"/><countdown visible=\"true\"/></ui_properties>
", $domDocument->saveXML());
    }

    public function testToStringWithAllSettings()
    {
        $uiProperties = new UIPropertiesStub();
        $uiProperties->setChatVisible(true)
                     ->setChatAvatarVisible(false)
                     ->setMapInfoVisible(true)
                     ->setCountdownVisible(false)
                     ->setGoVisible(true);

        $xmlString = (string)$uiProperties;

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<ui_properties><chat visible=\"true\"/><chat_avatar visible=\"false\"/><map_info visible=\"true\"/><countdown visible=\"false\"/><go visible=\"true\"/></ui_properties>
", $xmlString);
    }

}
