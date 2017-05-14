<?php

use FML\Controls\Graph;
use FML\Script\Features\GraphCurve;

class GraphCurveTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $graph      = new Graph();
        $points     = array(array(1., 2.), array(3., 4.));
        $graphCurve = new GraphCurve($graph, $points);

        $this->assertSame($graph, $graphCurve->getGraph());
        $this->assertEquals(array(array(1., 2.), array(3., 4.)), $graphCurve->getPoints());
    }

    public function testGraph()
    {
        $graphCurve = new GraphCurve();
        $graph      = new Graph();

        $this->assertNull($graphCurve->getGraph());
        $this->assertNull($graph->getId());

        $this->assertSame($graphCurve, $graphCurve->setGraph($graph));

        $this->assertSame($graph, $graphCurve->getGraph());
        $this->assertNotNull($graph->getId());
    }

    public function testPoints()
    {
        $graphCurve = new GraphCurve();

        $this->assertEmpty($graphCurve->getPoints());

        $this->assertSame($graphCurve, $graphCurve->addPoint(array(1., 2.))
                                                  ->addPoint(3., 4.));

        $this->assertEquals(array(array(1., 2.), array(3., 4.)), $graphCurve->getPoints());

        $this->assertSame($graphCurve, $graphCurve->addPoints(array(array(5., 6.), array(7., 8.))));

        $this->assertEquals(array(array(1., 2.), array(3., 4.), array(5., 6.), array(7., 8.)), $graphCurve->getPoints());

        $this->assertSame($graphCurve, $graphCurve->setPoints(array(array(1., 3.), array(5., 7.))));

        $this->assertEquals(array(array(1., 3.), array(5., 7.)), $graphCurve->getPoints());

        $this->assertSame($graphCurve, $graphCurve->removeAllPoints());

        $this->assertEmpty($graphCurve->getPoints());
    }

    public function testSortPoints()
    {
        $graphCurve = new GraphCurve();

        $this->assertFalse($graphCurve->getSortPoints());

        $this->assertSame($graphCurve, $graphCurve->setSortPoints(true));

        $this->assertTrue($graphCurve->getSortPoints());
    }

    public function testColor()
    {
        $graphCurve = new GraphCurve();

        $this->assertNull($graphCurve->getColor());

        $this->assertSame($graphCurve, $graphCurve->setColor(array(1., 2., 3.)));

        $this->assertEquals(array(1., 2., 3.), $graphCurve->getColor());
    }

    public function testStyle()
    {
        $graphCurve = new GraphCurve();

        $this->assertNull($graphCurve->getStyle());

        $this->assertSame($graphCurve, $graphCurve->setStyle("test-style"));

        $this->assertEquals("test-style", $graphCurve->getStyle());
    }

    public function testWidth()
    {
        $graphCurve = new GraphCurve();

        $this->assertNull($graphCurve->getWidth());

        $this->assertSame($graphCurve, $graphCurve->setWidth(13.37));

        $this->assertEquals(13.37, $graphCurve->getWidth());
    }

}
