<?php

use FML\Controls\Quads\Quad_BgRaceScore2;

class Quad_BgRaceScore2Text extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_BgRaceScore2();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
