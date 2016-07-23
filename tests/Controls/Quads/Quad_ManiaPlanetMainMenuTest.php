<?php

use FML\Controls\Quads\Quad_ManiaPlanetMainMenu;

class Quad_ManiaPlanetMainMenuTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_ManiaPlanetMainMenu();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
