<?php

use FML\Controls\Quads\Quad_Icons64x64_2;

class Quad_Icons64x64_2Test extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Icons64x64_2();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
