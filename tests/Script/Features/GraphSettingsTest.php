<?php

use FML\Controls\Graph;
use FML\Script\Features\GraphSettings;
use FML\Script\Script;
use FML\Script\ScriptLabel;

class GraphSettingsTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $graph         = new Graph();
        $graphSettings = new GraphSettings($graph);

        $this->assertSame($graph, $graphSettings->getGraph());
    }

    public function testGraph()
    {
        $graphSettings = new GraphSettings();
        $graph         = new Graph();

        $this->assertNull($graphSettings->getGraph());
        $this->assertNull($graph->getId());

        $this->assertSame($graphSettings, $graphSettings->setGraph($graph));

        $this->assertSame($graph, $graphSettings->getGraph());
        $this->assertNotNull($graph->getId());
    }

    public function testMinimumCoordinates()
    {
        $graphSettings = new GraphSettings();

        $this->assertNull($graphSettings->getMinimumCoordinates());

        $this->assertSame($graphSettings, $graphSettings->setMinimumCoordinates(array(1., 2.)));

        $this->assertEquals(array(1., 2.), $graphSettings->getMinimumCoordinates());
    }

    public function testMaximumCoordinates()
    {
        $graphSettings = new GraphSettings();

        $this->assertNull($graphSettings->getMaximumCoordinates());

        $this->assertSame($graphSettings, $graphSettings->setMaximumCoordinates(array(3., 4.)));

        $this->assertEquals(array(3., 4.), $graphSettings->getMaximumCoordinates());
    }

    public function testPrepare()
    {
        $graph         = new Graph();
        $graphSettings = new GraphSettings();
        $graphSettings->setGraph($graph);
        $script = new Script();

        $graphSettings->prepare($script);

        $genericScriptLabels = $script->getGenericScriptLabels();
        $this->assertNotEmpty($genericScriptLabels);
        $onInitScriptLabel = $genericScriptLabels[0];
        $this->assertEquals(ScriptLabel::OnInit, $onInitScriptLabel->getName());
        $this->assertNotNull($onInitScriptLabel->getText());
    }

}
