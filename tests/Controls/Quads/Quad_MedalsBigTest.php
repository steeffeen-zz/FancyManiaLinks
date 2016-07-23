<?php

use FML\Controls\Quads\Quad_MedalsBig;

class Quad_MedalsBigTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_MedalsBig();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
