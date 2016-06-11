<?php

require_once __DIR__ . '/../autoload.php';

class UniqueIDTest extends \PHPUnit_Framework_TestCase
{

    public function testUniqueIDs()
    {
        $firstUniqueID  = new \FML\UniqueID();
        $secondUniqueID = new \FML\UniqueID();
        $thirdUniqueID  = new \FML\UniqueID();

        $this->assertEquals($firstUniqueID->getValue(), "FML_ID_1");
        $this->assertEquals($secondUniqueID->getValue(), "FML_ID_2");
        $this->assertEquals($thirdUniqueID->getValue(), "FML_ID_3");
    }

}
