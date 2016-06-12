<?php

use FML\CustomUI;

class CustomUITest extends \PHPUnit_Framework_TestCase
{

    public function testGlobalVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getGlobalVisible());

        $this->assertSame($customUI->setGlobalVisible(true), $customUI);

        $this->assertTrue($customUI->getGlobalVisible());
    }

    public function testChallengeInfoVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getChallengeInfoVisible());

        $this->assertSame($customUI->setChallengeInfoVisible(true), $customUI);

        $this->assertTrue($customUI->getChallengeInfoVisible());
    }

    public function testChatVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getChatVisible());

        $this->assertSame($customUI->setChatVisible(true), $customUI);

        $this->assertTrue($customUI->getChatVisible());
    }

    public function testCheckpointListVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getCheckpointListVisible());

        $this->assertSame($customUI->setCheckpointListVisible(true), $customUI);

        $this->assertTrue($customUI->getCheckpointListVisible());
    }

    public function testNetInfosVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getNetInfosVisible());

        $this->assertSame($customUI->setNetInfosVisible(true), $customUI);

        $this->assertTrue($customUI->getNetInfosVisible());
    }

    public function testNoticeVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getNoticeVisible());

        $this->assertSame($customUI->setNoticeVisible(true), $customUI);

        $this->assertTrue($customUI->getNoticeVisible());
    }

    public function testRoundScoresVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getRoundScoresVisible());

        $this->assertSame($customUI->setRoundScoresVisible(true), $customUI);

        $this->assertTrue($customUI->getRoundScoresVisible());
    }

    public function testScoretableVisible()
    {
        $customUI = new CustomUI();

        $this->assertNull($customUI->getScoretableVisible());

        $this->assertSame($customUI->setScoretableVisible(true), $customUI);

        $this->assertTrue($customUI->getScoretableVisible());
    }

    public function testToStringWithAllSettings()
    {
        $customUI = new CustomUI();
        $customUI->setGlobalVisible(true)
                 ->setChallengeInfoVisible(false)
                 ->setChatVisible(true)
                 ->setCheckpointListVisible(false)
                 ->setNetInfosVisible(true)
                 ->setNoticeVisible(false)
                 ->setRoundScoresVisible(true)
                 ->setScoretableVisible(false);

        $xmlString = (string)$customUI;

        $this->assertEquals($xmlString, "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<custom_ui><global visible=\"1\"/><challenge_info visible=\"0\"/><chat visible=\"1\"/><checkpoint_list visible=\"0\"/><net_infos visible=\"1\"/><notice visible=\"0\"/><round_scores visible=\"1\"/><scoretable visible=\"0\"/></custom_ui>
");
    }

    public function testRenderWithSomeSettings()
    {
        $domDocument = new \DOMDocument();
        $customUI    = new CustomUI();
        $customUI->setGlobalVisible(false)
                 ->setChatVisible(true)
                 ->setNetInfosVisible(false)
                 ->setNoticeVisible(true);

        $domElement = $customUI->render($domDocument);
        $domDocument->appendChild($domElement);

        $this->assertEquals($domDocument->saveXML(), "<?xml version=\"1.0\"?>
<custom_ui><global visible=\"0\"/><chat visible=\"1\"/><net_infos visible=\"0\"/><notice visible=\"1\"/></custom_ui>
");
    }

}
