<?php

namespace FML\XmlRpc;

/**
 * Class representing ShootMania UI Properties
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2017 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class SMUIProperties extends UIProperties
{

    /**
     * @var array $noticesProperties Notices properties
     */
    protected $noticesProperties = array();

    /**
     * @var array $crosshairProperties Crosshair properties
     */
    protected $crosshairProperties = array();

    /**
     * @var array $gaugesProperties Gauges properties
     */
    protected $gaugesProperties = array();

    /**
     * @var array $consumablesProperties Consumables properties
     */
    protected $consumablesProperties = array();

    /**
     * @var array $endMapLadderRecapProperties End map ladder recap properties
     */
    protected $endMapLadderRecapProperties = array();

    /**
     * @var array $scoresTableProperties Scores table properties
     */
    protected $scoresTableProperties = array();

    /**
     * Get the notices visibility
     *
     * @api
     * @return bool
     */
    public function getNoticesVisible()
    {
        return $this->getVisibleProperty($this->noticesProperties);
    }

    /**
     * Set the notices visibility
     *
     * @api
     * @param bool $visible If the notices should be visible
     * @return static
     */
    public function setNoticesVisible($visible)
    {
        $this->setVisibleProperty($this->noticesProperties, $visible);
        return $this;
    }

    /**
     * Get the crosshair visibility
     *
     * @api
     * @return bool
     */
    public function getCrosshairVisible()
    {
        return $this->getVisibleProperty($this->crosshairProperties);
    }

    /**
     * Set the crosshair visibility
     *
     * @api
     * @param bool $visible If the crosshair should be visible
     * @return static
     */
    public function setCrosshairVisible($visible)
    {
        $this->setVisibleProperty($this->crosshairProperties, $visible);
        return $this;
    }

    /**
     * Get the gauges visibility
     *
     * @api
     * @return bool
     */
    public function getGaugesVisible()
    {
        return $this->getVisibleProperty($this->gaugesProperties);
    }

    /**
     * Set the gauges visibility
     *
     * @api
     * @param bool $visible If the gauges should be visible
     * @return static
     */
    public function setGaugesVisible($visible)
    {
        $this->setVisibleProperty($this->gaugesProperties, $visible);
        return $this;
    }

    /**
     * Get the consumables visibility
     *
     * @api
     * @return bool
     */
    public function getConsumablesVisible()
    {
        return $this->getVisibleProperty($this->consumablesProperties);
    }

    /**
     * Set the consumables visibility
     *
     * @api
     * @param bool $visible If the consumables should be visible
     * @return static
     */
    public function setConsumablesVisible($visible)
    {
        $this->setVisibleProperty($this->consumablesProperties, $visible);
        return $this;
    }

    /**
     * Get the end map ladder recap visibility
     *
     * @api
     * @return bool
     */
    public function getEndMapLadderRecapVisible()
    {
        return $this->getVisibleProperty($this->endMapLadderRecapProperties);
    }

    /**
     * Set the end map ladder recap visibility
     *
     * @api
     * @param bool $visible If the end map ladder recap should be visible
     * @return static
     */
    public function setEndMapLadderRecapVisible($visible)
    {
        $this->setVisibleProperty($this->endMapLadderRecapProperties, $visible);
        return $this;
    }

    /**
     * Get the scores table alt visibility
     *
     * @api
     * @return bool
     */
    public function getScoresTableAltVisible()
    {
        return $this->getProperty($this->scoresTableProperties, "alt_visible");
    }

    /**
     * Set the scores table alt visibility
     *
     * @api
     * @param bool $altVisible If the scores table should be visible on alt
     * @return static
     */
    public function setScoresTableAltVisible($altVisible)
    {
        $this->setProperty($this->scoresTableProperties, "alt_visible", (bool)$altVisible);
        return $this;
    }

    /**
     * @see UIProperties::getProperties()
     */
    protected function getProperties()
    {
        return array_merge(parent::getProperties(), array(
            "notices" => $this->noticesProperties,
            "crosshair" => $this->crosshairProperties,
            "gauges" => $this->gaugesProperties,
            "consumables" => $this->consumablesProperties,
            "endmap_ladder_recap" => $this->endMapLadderRecapProperties,
            "scorestable" => $this->scoresTableProperties
        ));
    }

}
