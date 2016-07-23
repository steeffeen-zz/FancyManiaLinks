<?php

use FML\Controls\Quads\Quad_TitleLogos;

class Quad_TitleLogosTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_TitleLogos();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
