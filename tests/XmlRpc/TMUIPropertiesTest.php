<?php

use FML\XmlRpc\TMUIProperties;

class TMUIPropertiesTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $tmUiProperties = TMUIProperties::create();

        $this->assertTrue($tmUiProperties instanceof TMUIProperties);
    }

    public function testLiveInfoVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getLiveInfoVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setLiveInfoVisible(false));

        $this->assertFalse($tmUiProperties->getLiveInfoVisible());
    }

    public function testLiveInfoPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getLiveInfoPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setLiveInfoPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getLiveInfoPosition());
    }

    public function testSpectatorInfoVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getSpectatorInfoVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setSpectatorInfoVisible(false));

        $this->assertFalse($tmUiProperties->getSpectatorInfoVisible());
    }

    public function testSpectatorInfoPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getSpectatorInfoPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setSpectatorInfoPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getSpectatorInfoPosition());
    }

    public function testOpponentsInfoVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getOpponentsInfoVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setOpponentsInfoVisible(false));

        $this->assertFalse($tmUiProperties->getOpponentsInfoVisible());
    }

    public function testCheckpointListVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getCheckpointListVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setCheckpointListVisible(false));

        $this->assertFalse($tmUiProperties->getCheckpointListVisible());
    }

    public function testCheckpointListPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getCheckpointListPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setCheckpointListPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getCheckpointListPosition());
    }

    public function testRoundScoresVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getRoundScoresVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setRoundScoresVisible(false));

        $this->assertFalse($tmUiProperties->getRoundScoresVisible());
    }

    public function testRoundScoresPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getRoundScoresPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setRoundScoresPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getRoundScoresPosition());
    }

    public function testChronoVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getChronoVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setChronoVisible(false));

        $this->assertFalse($tmUiProperties->getChronoVisible());
    }

    public function testChronoPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getChronoPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setChronoPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getChronoPosition());
    }

    public function testSpeedAndDistanceVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getSpeedAndDistanceVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setSpeedAndDistanceVisible(false));

        $this->assertFalse($tmUiProperties->getSpeedAndDistanceVisible());
    }

    public function testSpeedAndDistancePosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getSpeedAndDistancePosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setSpeedAndDistancePosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getSpeedAndDistancePosition());
    }

    public function testPersonalBestAndRankVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getPersonalBestAndRankVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setPersonalBestAndRankVisible(false));

        $this->assertFalse($tmUiProperties->getPersonalBestAndRankVisible());
    }

    public function testPersonalBestAndRankPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getPersonalBestAndRankPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setPersonalBestAndRankPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getPersonalBestAndRankPosition());
    }

    public function testPositionVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getPositionVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setPositionVisible(false));

        $this->assertFalse($tmUiProperties->getPositionVisible());
    }

    public function testPositionPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getPositionPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setPositionPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getPositionPosition());
    }

    public function testCheckpointTimeVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getCheckpointTimeVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setCheckpointTimeVisible(false));

        $this->assertFalse($tmUiProperties->getCheckpointTimeVisible());
    }

    public function testCheckpointTimePosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getCheckpointTimePosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setCheckpointTimePosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getCheckpointTimePosition());
    }

    public function testWarmUpVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getWarmUpVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setWarmUpVisible(false));

        $this->assertFalse($tmUiProperties->getWarmUpVisible());
    }

    public function testWarmUpPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getWarmUpPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setWarmUpPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getWarmUpPosition());
    }

    public function testMultiLapInfoVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getMultiLapInfoVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setMultiLapInfoVisible(false));

        $this->assertFalse($tmUiProperties->getMultiLapInfoVisible());
    }

    public function testMultiLapInfoPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getMultiLapInfoPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setMultiLapInfoPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getMultiLapInfoPosition());
    }

    public function testCheckpointRankingVisible()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getCheckpointRankingVisible());

        $this->assertSame($tmUiProperties, $tmUiProperties->setCheckpointRankingVisible(false));

        $this->assertFalse($tmUiProperties->getCheckpointRankingVisible());
    }

    public function testCheckpointRankingPosition()
    {
        $tmUiProperties = new TMUIProperties();

        $this->assertNull($tmUiProperties->getCheckpointRankingPosition());

        $this->assertSame($tmUiProperties, $tmUiProperties->setCheckpointRankingPosition(1.2, 3.4, 5.6));

        $this->assertEquals("1.2 3.4 5.6", $tmUiProperties->getCheckpointRankingPosition());
    }

    public function testToStringWithAllSettings()
    {
        $tmUiProperties = new TMUIProperties();
        $tmUiProperties->setChatVisible(false)
                       ->setLiveInfoVisible(true)
                       ->setLiveInfoPosition(9.8, 7.6, 5.4)
                       ->setSpectatorInfoVisible(false)
                       ->setSpectatorInfoPosition(9.8, 7.6, 5.4)
                       ->setOpponentsInfoVisible(true)
                       ->setCheckpointListVisible(false)
                       ->setCheckpointListPosition(9.8, 7.6, 5.4)
                       ->setRoundScoresVisible(true)
                       ->setRoundScoresPosition(9.8, 7.6, 5.4)
                       ->setChronoVisible(false)
                       ->setChronoPosition(9.8, 7.6, 5.4)
                       ->setSpeedAndDistanceVisible(true)
                       ->setSpeedAndDistancePosition(9.8, 7.6, 5.4)
                       ->setPersonalBestAndRankVisible(false)
                       ->setPersonalBestAndRankPosition(9.8, 7.6, 5.4)
                       ->setPositionVisible(true)
                       ->setPositionPosition(9.8, 7.6, 5.4)
                       ->setCheckpointTimeVisible(false)
                       ->setCheckpointTimePosition(9.8, 7.6, 5.4)
                       ->setWarmUpVisible(true)
                       ->setWarmUpPosition(9.8, 7.6, 5.4)
                       ->setMultiLapInfoVisible(false)
                       ->setMultiLapInfoPosition(9.8, 7.6, 5.4)
                       ->setCheckpointRankingVisible(true)
                       ->setCheckpointRankingPosition(9.8, 7.6, 5.4);

        $xmlString = (string)$tmUiProperties;

        $this->assertEquals("<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"yes\"?>
<ui_properties><chat visible=\"false\"/><live_info visible=\"true\" pos=\"9.8 7.6 5.4\"/><spectator_info visible=\"false\" pos=\"9.8 7.6 5.4\"/><opponents_info visible=\"true\"/><checkpoint_list visible=\"false\" pos=\"9.8 7.6 5.4\"/><round_scores visible=\"true\" pos=\"9.8 7.6 5.4\"/><chrono visible=\"false\" pos=\"9.8 7.6 5.4\"/><speed_and_distance visible=\"true\" pos=\"9.8 7.6 5.4\"/><personal_best_and_rank visible=\"false\" pos=\"9.8 7.6 5.4\"/><position visible=\"true\" pos=\"9.8 7.6 5.4\"/><checkpoint_time visible=\"false\" pos=\"9.8 7.6 5.4\"/><warmup visible=\"true\" pos=\"9.8 7.6 5.4\"/><multilap_info visible=\"false\" pos=\"9.8 7.6 5.4\"/><checkpoint_ranking visible=\"true\" pos=\"9.8 7.6 5.4\"/></ui_properties>
", $xmlString);
    }

}
