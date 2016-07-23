<?php

use FML\Controls\Quads\Quad_EnergyBar;

class Quad_EnergyBarTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_EnergyBar();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
