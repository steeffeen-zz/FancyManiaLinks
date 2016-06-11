<?php

namespace FML\Stylesheet;

use FML\UniqueID;

/**
 * Class representing a Style3d
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Style3d
{

    /*
     * Constants
     */
    const MODEL_Box     = 'Box';
    const MODEL_Button  = 'Button';
    const MODEL_ButtonH = 'ButtonH';
    const MODEL_Title   = 'Title';
    const MODEL_Window  = 'Window';

    /*
     * Protected properties
     */
    protected $tagName = 'style3d';
    protected $styleId = null;
    protected $model = self::MODEL_Box;
    protected $thickness = null;
    protected $color = null;
    protected $focusColor = null;
    protected $lightColor = null;
    protected $focusLightColor = null;
    protected $yOffset = null;
    protected $focusYOffset = null;
    protected $zOffset = null;
    protected $focusZOffset = null;

    /**
     * Create a new Style3d
     *
     * @api
     * @param string $styleId (optional) Style id
     * @return static
     */
    public static function create($styleId = null)
    {
        return new static($styleId);
    }

    /**
     * Construct a new Style3d
     *
     * @api
     * @param string $styleId (optional) Style id
     */
    public function __construct($styleId = null)
    {
        if ($styleId !== null) {
            $this->setId($styleId);
        }
    }

    /**
     * Set the style id
     *
     * @api
     * @param string $styleId Style id
     * @return static
     */
    public function setId($styleId)
    {
        $this->styleId = (string)$styleId;
        return $this;
    }

    /**
     * Check for id and assign one if necessary
     *
     * @return static
     */
    public function checkId()
    {
        if (!$this->styleId) {
            $this->setId(new UniqueID());
        }
        return $this;
    }

    /**
     * Get the style id
     *
     * @api
     * @return string
     */
    public function getId()
    {
        return $this->styleId;
    }

    /**
     * Set the model
     *
     * @api
     * @param string $model Style model
     * @return static
     */
    public function setModel($model)
    {
        $this->model = (string)$model;
        return $this;
    }

    /**
     * Set the thickness
     *
     * @api
     * @param float $thickness Style thickness
     * @return static
     */
    public function setThickness($thickness)
    {
        $this->thickness = (float)$thickness;
        return $this;
    }

    /**
     * Set the color
     *
     * @api
     * @param string $color Style color
     * @return static
     */
    public function setColor($color)
    {
        $this->color = (string)$color;
        return $this;
    }

    /**
     * Set the focus color
     *
     * @api
     * @param string $focusColor Style focus color
     * @return static
     */
    public function setFocusColor($focusColor)
    {
        $this->focusColor = (string)$focusColor;
        return $this;
    }

    /**
     * Set the light color
     *
     * @api
     * @param string $lightColor Light color
     * @return static
     */
    public function setLightColor($lightColor)
    {
        $this->lightColor = (string)$lightColor;
        return $this;
    }

    /**
     * Set the focus light color
     *
     * @api
     * @param string $focusLightColor Focus light color
     * @return static
     */
    public function setFocusLightColor($focusLightColor)
    {
        $this->focusLightColor = (string)$focusLightColor;
        return $this;
    }

    /**
     * Set the Y-offset
     *
     * @api
     * @param float $yOffset Y-offset
     * @return static
     */
    public function setYOffset($yOffset)
    {
        $this->yOffset = (float)$yOffset;
        return $this;
    }

    /**
     * Set the focus Y-offset
     *
     * @api
     * @param float $focusYOffset Focus Y-offset
     * @return static
     */
    public function setFocusYOffset($focusYOffset)
    {
        $this->focusYOffset = (float)$focusYOffset;
        return $this;
    }

    /**
     * Set the Z-offset
     *
     * @api
     * @param float $zOffset Z-offset
     * @return static
     */
    public function setZOffset($zOffset)
    {
        $this->zOffset = (float)$zOffset;
        return $this;
    }

    /**
     * Set the focus Z-offset
     *
     * @api
     * @param float $focusZOffset Focus Z-offset
     * @return static
     */
    public function setFocusZOffset($focusZOffset)
    {
        $this->focusZOffset = (float)$focusZOffset;
        return $this;
    }

    /**
     * Render the Style3d
     *
     * @param \DOMDocument $domDocument DOMDocument for which the Style3d should be rendered
     * @return \DOMElement
     */
    public function render(\DOMDocument $domDocument)
    {
        $style3dXml = $domDocument->createElement($this->tagName);
        $this->checkId();
        if ($this->styleId) {
            $style3dXml->setAttribute('id', $this->styleId);
        }
        if ($this->model) {
            $style3dXml->setAttribute('model', $this->model);
        }
        if ($this->thickness) {
            $style3dXml->setAttribute('thickness', $this->thickness);
        }
        if ($this->color) {
            $style3dXml->setAttribute('color', $this->color);
        }
        if ($this->focusColor) {
            $style3dXml->setAttribute('fcolor', $this->focusColor);
        }
        if ($this->lightColor) {
            $style3dXml->setAttribute('lightcolor', $this->lightColor);
        }
        if ($this->focusLightColor) {
            $style3dXml->setAttribute('flightcolor', $this->focusLightColor);
        }
        if ($this->yOffset) {
            $style3dXml->setAttribute('yoffset', $this->yOffset);
        }
        if ($this->focusYOffset) {
            $style3dXml->setAttribute('fyoffset', $this->focusYOffset);
        }
        if ($this->zOffset) {
            $style3dXml->setAttribute('zoffset', $this->zOffset);
        }
        if ($this->focusZOffset) {
            $style3dXml->setAttribute('fzoffset', $this->focusZOffset);
        }
        return $style3dXml;
    }

}
