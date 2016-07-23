<?php

use FML\Controls\Quads\Quad_BgsChallengeMedals;

class Quad_BgsChallengeMedalsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $quad = new Quad_BgsChallengeMedals();

        $this->assertNotNull($quad);
        $this->assertEquals($quad::STYLE, $quad->getStyle());
    }

}
