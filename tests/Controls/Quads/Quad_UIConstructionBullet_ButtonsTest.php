<?php

use FML\Controls\Quads\Quad_UIConstructionBullet_Buttons;

class Quad_UIConstructionBullet_ButtonsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_UIConstructionBullet_Buttons();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
