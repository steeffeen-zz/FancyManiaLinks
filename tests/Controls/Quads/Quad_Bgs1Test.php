<?php

use FML\Controls\Quads\Quad_Bgs1;

class Quad_Bgs1Test extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Bgs1();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
