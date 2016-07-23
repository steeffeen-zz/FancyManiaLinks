<?php

use FML\Controls\Quads\Quad_ManiaPlanetSystem;

class Quad_ManiaPlanetSystemTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_ManiaPlanetSystem();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
