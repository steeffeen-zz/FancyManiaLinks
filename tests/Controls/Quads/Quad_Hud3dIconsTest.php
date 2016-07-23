<?php

use FML\Controls\Quads\Quad_Hud3dIcons;

class Quad_Hud3dIconsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Hud3dIcons();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
