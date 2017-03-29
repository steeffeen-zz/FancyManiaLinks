<?php

use FML\Controls\Graph;
use FML\Script\Features\GraphCurve;

class GraphTest extends \PHPUnit_Framework_TestCase
{

    public function testCurves()
    {
        $graph       = new Graph();
        $graphCurve1 = new GraphCurve();
        $graphCurve2 = new GraphCurve();
        $graphCurve3 = new GraphCurve();

        $this->assertEmpty($graph->getCurves());
        $this->assertEmpty($graph->getScriptFeatures());

        $this->assertSame($graph, $graph->addCurve($graphCurve1));

        $this->assertEquals(array($graphCurve1), $graph->getCurves());
        $this->assertEquals(array($graphCurve1), $graph->getScriptFeatures());

        $this->assertSame($graph, $graph->addCurves(array($graphCurve2, $graphCurve3)));

        $this->assertEquals(array($graphCurve1, $graphCurve2, $graphCurve3), $graph->getCurves());
        $this->assertEquals(array($graphCurve1, $graphCurve2, $graphCurve3), $graph->getScriptFeatures());
    }

    public function testTagName()
    {
        $graph = new Graph();

        $this->assertEquals("graph", $graph->getTagName());
    }

    public function testManiaScriptClass()
    {
        $graph = new Graph();

        $this->assertEquals("CMlGraph", $graph->getManiaScriptClass());
    }

}
