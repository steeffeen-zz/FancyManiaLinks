<?php

use FML\Controls\Quads\Quad_UIConstruction_Buttons;

class Quad_UIConstruction_ButtonsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_UIConstruction_Buttons();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
