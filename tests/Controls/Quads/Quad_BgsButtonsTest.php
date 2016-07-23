<?php

use FML\Controls\Quads\Quad_BgsButtons;

class Quad_BgsButtonsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_BgsButtons();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
