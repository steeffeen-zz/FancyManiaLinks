<?php

use FML\Controls\Quads\Quad_Hud3dEchelons;

class Quad_Hud3dEchelonsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Hud3dEchelons();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
