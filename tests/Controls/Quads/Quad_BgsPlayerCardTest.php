<?php

use FML\Controls\Quads\Quad_BgsPlayerCard;

class Quad_BgsPlayerCardTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_BgsPlayerCard();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
