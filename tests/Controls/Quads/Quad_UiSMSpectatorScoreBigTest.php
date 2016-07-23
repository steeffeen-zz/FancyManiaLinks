<?php

use FML\Controls\Quads\Quad_UiSMSpectatorScoreBig;

class Quad_UiSMSpectatorScoreBigTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_UiSMSpectatorScoreBig();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
