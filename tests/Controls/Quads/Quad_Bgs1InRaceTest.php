<?php

use FML\Controls\Quads\Quad_Bgs1InRace;

class Quad_Bgs1InRaceTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Bgs1InRace();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
