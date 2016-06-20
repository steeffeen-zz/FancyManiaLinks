<?php

use FML\Controls\Audio;
use FML\UniqueID;

class UniqueIDTest extends \PHPUnit_Framework_TestCase
{

    public function testUniqueIDs()
    {
        $firstUniqueID  = new UniqueID();
        $secondUniqueID = new UniqueID();
        $thirdUniqueID  = new UniqueID();

        $this->assertEquals($secondUniqueID->getIndex(), $firstUniqueID->getIndex() + 1);
        $this->assertEquals($thirdUniqueID->getIndex(), $secondUniqueID->getIndex() + 1);

        $this->assertEquals($firstUniqueID->getValue(), "FML_ID_" . $firstUniqueID->getIndex());
        $this->assertEquals($secondUniqueID->getValue(), "FML_ID_" . $secondUniqueID->getIndex());
        $this->assertEquals($thirdUniqueID->getValue(), "FML_ID_" . $thirdUniqueID->getIndex());
    }

    public function testCheckWithoutId()
    {
        $audio = new Audio();

        $elementId = UniqueID::check($audio);

        $this->assertNotNull($elementId);
        $this->assertEquals($elementId, $audio->getId());
    }

    /**
     * @expectedException \PHPUnit_Framework_Error_Notice
     */
    public function testCheckWithDangerousId()
    {
        $audio = new Audio("dangerous id");

        $elementId = UniqueID::check($audio);

        $this->assertNotNull($elementId);
        $this->assertEquals("dangerousid", $elementId);
        $this->assertEquals("dangerousid", $audio->getId());
    }

}
