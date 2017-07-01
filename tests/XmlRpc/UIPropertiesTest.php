<?php

use FML\XmlRpc\UIProperties;

class UIPropertiesTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $uiProperties = UIProperties::create();

        $this->assertTrue($uiProperties instanceof UIProperties);
    }

    public function testChatVisible()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getChatVisible());

        $this->assertSame($uiProperties, $uiProperties->setChatVisible(false));

        $this->assertFalse($uiProperties->getChatVisible());
    }

    public function testChatOffset()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getChatOffset());

        $this->assertSame($uiProperties, $uiProperties->setChatOffset(1.3, 3.7));

        $this->assertEquals("1.3 3.7", $uiProperties->getChatOffset());
    }

    public function testChatLineCount()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getChatLineCount());

        $this->assertSame($uiProperties, $uiProperties->setChatLineCount(42));

        $this->assertEquals(42, $uiProperties->getChatLineCount());
    }

    public function testChatAvatarVisible()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getChatAvatarVisible());

        $this->assertSame($uiProperties, $uiProperties->setChatAvatarVisible(false));

        $this->assertFalse($uiProperties->getChatAvatarVisible());
    }

    public function testMapInfoVisible()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getMapInfoVisible());

        $this->assertSame($uiProperties, $uiProperties->setMapInfoVisible(false));

        $this->assertFalse($uiProperties->getMapInfoVisible());
    }

    public function testMapInfoPosition()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getMapInfoPosition());

        $this->assertSame($uiProperties, $uiProperties->setMapInfoPosition(1.3, 3.7, 4.2));

        $this->assertEquals("1.3 3.7 4.2", $uiProperties->getMapInfoPosition());
    }

    public function testCountdownVisible()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getCountdownVisible());

        $this->assertSame($uiProperties, $uiProperties->setCountdownVisible(false));

        $this->assertFalse($uiProperties->getCountdownVisible());
    }

    public function testCountdownPosition()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getCountdownPosition());

        $this->assertSame($uiProperties, $uiProperties->setCountdownPosition(4.2, 1.3, 3.7));

        $this->assertEquals("4.2 1.3 3.7", $uiProperties->getCountdownPosition());
    }

    public function testGoVisible()
    {
        $uiProperties = new UIProperties();

        $this->assertNull($uiProperties->getGoVisible());

        $this->assertSame($uiProperties, $uiProperties->setGoVisible(false));

        $this->assertFalse($uiProperties->getGoVisible());
    }

    public function testRenderStandaloneWithSomeSettings()
    {
        $uiProperties = new UIProperties();
        $uiProperties->setChatVisible(false)
                     ->setChatOffset(5.6, 7.8)
                     ->setMapInfoVisible(false)
                     ->setCountdownVisible(true)
                     ->setCountdownPosition(1.2, 3.4, 5.6);

        $domDocument = $uiProperties->renderStandalone();

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<ui_properties><chat visible=\"false\" offset=\"5.6 7.8\"/><map_info visible=\"false\"/><countdown visible=\"true\" pos=\"1.2 3.4 5.6\"/></ui_properties>
", $domDocument->saveXML());
    }

    public function testToStringWithSomeOtherSettings()
    {
        $uiProperties = new UIProperties();
        $uiProperties->setChatVisible(true)
                     ->setChatLineCount(13)
                     ->setChatAvatarVisible(false)
                     ->setMapInfoVisible(true)
                     ->setMapInfoPosition(9.8, 7.6, 5.4)
                     ->setCountdownVisible(false)
                     ->setGoVisible(true);

        $xmlString = (string)$uiProperties;

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<ui_properties><chat visible=\"true\" linecount=\"13\"/><chat_avatar visible=\"false\"/><map_info visible=\"true\" pos=\"9.8 7.6 5.4\"/><countdown visible=\"false\"/><go visible=\"true\"/></ui_properties>
", $xmlString);
    }

}
