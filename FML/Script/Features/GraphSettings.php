<?php

namespace FML\Script\Features;

use FML\Controls\Graph;
use FML\Script\Builder;
use FML\Script\Script;
use FML\Script\ScriptLabel;

/**
 * Script Feature setting up a Graph
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2017 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class GraphSettings extends ScriptFeature
{

    /**
     * @var Graph $graph Graph
     */
    protected $graph = null;

    /**
     * @var float[] $minimumCoordinates Minimum Coordinates
     */
    protected $minimumCoordinates = null;

    /**
     * @var float[] $maximumCoordinates Maximum Coordinates
     */
    protected $maximumCoordinates = null;

    /**
     * Construct new Graph Settings
     *
     * @api
     * @param Graph $graph (optional) Graph
     */
    public function __construct(Graph $graph = null)
    {
        if ($graph) {
            $this->setGraph($graph);
        }
    }

    /**
     * Get the Graph
     *
     * @api
     * @return Graph
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * Set the Graph
     *
     * @api
     * @param Graph $graph Graph
     * @return static
     */
    public function setGraph(Graph $graph)
    {
        $graph->checkId();
        $this->graph = $graph;
        return $this;
    }

    /**
     * Get the minimum coordinates
     *
     * @api
     * @return float[]
     */
    public function getMinimumCoordinates()
    {
        return $this->minimumCoordinates;
    }

    /**
     * Set the minimum coordinates
     *
     * @api
     * @param float[] $minimumCoordinates Minimum coordinates
     * @return static
     */
    public function setMinimumCoordinates(array $minimumCoordinates)
    {
        $this->minimumCoordinates = $minimumCoordinates;
        return $this;
    }

    /**
     * Get the maximum coordinates
     *
     * @api
     * @return float[]
     */
    public function getMaximumCoordinates()
    {
        return $this->maximumCoordinates;
    }

    /**
     * Set the maximum coordinates
     *
     * @api
     * @param float[] $maximumCoordinates Maximum coordinates
     * @return static
     */
    public function setMaximumCoordinates(array $maximumCoordinates)
    {
        $this->maximumCoordinates = $maximumCoordinates;
        return $this;
    }

    /**
     * @see ScriptFeature::prepare()
     */
    public function prepare(Script $script)
    {
        $controlScript = new ControlScript($this->graph, $this->getOnInitScriptText(), ScriptLabel::OnInit);
        $controlScript->prepare($script);
        return $this;
    }

    /**
     * Get the on init event script text
     *
     * @return string
     */
    protected function getOnInitScriptText()
    {
        $scriptText = "";
        if ($this->minimumCoordinates) {
            $minimumCoordinatesValue = Builder::getVec2($this->minimumCoordinates);
            $scriptText              .= "
Graph.CoordsMin = {$minimumCoordinatesValue};";
        }
        if ($this->maximumCoordinates) {
            $maximumCoordinatesValue = Builder::getVec2($this->maximumCoordinates);
            $scriptText              .= "
Graph.CoordsMax = {$maximumCoordinatesValue};";
        }
        return $scriptText;
    }

}
