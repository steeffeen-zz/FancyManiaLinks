<?php

use FML\Controls\Quads\Quad_ManiaPlanetLogos;

class Quad_ManiaPlanetLogosTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_ManiaPlanetLogos();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
