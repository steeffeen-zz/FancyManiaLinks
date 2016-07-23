<?php

use FML\Controls\Quads\Quad_Copilot;

class Quad_CopilotTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_Copilot();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
