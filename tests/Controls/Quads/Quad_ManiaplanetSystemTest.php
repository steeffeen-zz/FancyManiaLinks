<?php

use FML\Controls\Quads\Quad_ManiaplanetSystem;

class Quad_ManiaplanetSystemTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_ManiaplanetSystem();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
