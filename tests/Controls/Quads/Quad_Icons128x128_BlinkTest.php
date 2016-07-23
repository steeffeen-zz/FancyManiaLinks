<?php

use FML\Controls\Quads\Quad_Icons128x128_Blink;

class Quad_Icons128x128_BlinkTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Icons128x128_Blink();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
