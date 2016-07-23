<?php

use FML\Controls\Quads\Quad_Icons64x64_1;

class Quad_Icons64x64_1Test extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Icons64x64_1();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
