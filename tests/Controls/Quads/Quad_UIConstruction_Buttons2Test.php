<?php

use FML\Controls\Quads\Quad_UIConstruction_Buttons2;

class Quad_UIConstruction_Buttons2Test extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_UIConstruction_Buttons2();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
