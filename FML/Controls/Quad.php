<?php

namespace FML\Controls;

use FML\Components\CheckBoxDesign;
use FML\Types\Actionable;
use FML\Types\BgColorable;
use FML\Types\Linkable;
use FML\Types\Scriptable;
use FML\Types\Styleable;
use FML\Types\SubStyleable;

/**
 * Quad Control
 * (CMlQuad)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Quad extends Control implements Actionable, BgColorable, Linkable, Scriptable, Styleable, SubStyleable
{

    /*
     * Constants
     */
    const KEEP_RATIO_INACTIVE = 'inactive';
    const KEEP_RATIO_CLIP     = 'Clip';
    const KEEP_RATIO_FIT      = 'Fit';

    /*
     * Protected properties
     */
    protected $tagName = 'quad';
    protected $image = null;
    protected $imageId = null;
    protected $imageFocus = null;
    protected $imageFocusId = null;
    protected $colorize = null;
    protected $modulizeColor = null;
    protected $autoScale = 1;
    protected $keepRatio = null;
    protected $action = null;
    protected $actionKey = -1;
    protected $bgColor = null;
    protected $url = null;
    protected $urlId = null;
    protected $manialink = null;
    protected $manialinkId = null;
    protected $scriptEvents = null;
    protected $style = null;
    protected $subStyle = null;
    protected $styleSelected = null;
    protected $opacity = null;

    /**
     * @see Control::getManiaScriptClass()
     */
    public function getManiaScriptClass()
    {
        return 'CMlQuad';
    }

    /**
     * Set the image url
     *
     * @api
     * @param string $image Image url
     * @return static
     */
    public function setImage($image)
    {
        $this->image = (string)$image;
        return $this;
    }

    /**
     * Set the image id to use from Dico
     *
     * @api
     * @param string $imageId Image id
     * @return static
     */
    public function setImageId($imageId)
    {
        $this->imageId = (string)$imageId;
        return $this;
    }

    /**
     * Set the focus image url
     *
     * @api
     * @param string $imageFocus Focus image url
     * @return static
     */
    public function setImageFocus($imageFocus)
    {
        $this->imageFocus = (string)$imageFocus;
        return $this;
    }

    /**
     * Set the focus image id to use from Dico
     *
     * @api
     * @param string $imageFocusId Focus image id
     * @return static
     */
    public function setImageFocusId($imageFocusId)
    {
        $this->imageFocusId = (string)$imageFocusId;
        return $this;
    }

    /**
     * Set the colorization
     *
     * @api
     * @param string $colorize Colorize value
     * @return static
     */
    public function setColorize($colorize)
    {
        $this->colorize = (string)$colorize;
        return $this;
    }

    /**
     * Set the modulization
     *
     * @api
     * @param string $modulizeColor Modulize value
     * @return static
     */
    public function setModulizeColor($modulizeColor)
    {
        $this->modulizeColor = (string)$modulizeColor;
        return $this;
    }

    /**
     * Set the automatic image scaling
     *
     * @api
     * @param bool $autoScale If the image should scale automatically
     * @return static
     */
    public function setAutoScale($autoScale)
    {
        $this->autoScale = ($autoScale ? 1 : 0);
        return $this;
    }

    /**
     * Set the Keep Ratio mode
     *
     * @api
     * @param string $keepRatio Keep Ratio mode
     * @return static
     */
    public function setKeepRatio($keepRatio)
    {
        $this->keepRatio = (string)$keepRatio;
        return $this;
    }

    /**
     * @see Actionable::getAction()
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @see Actionable::setAction()
     */
    public function setAction($action)
    {
        $this->action = (string)$action;
        return $this;
    }

    /**
     * @see Actionable::setActionKey()
     */
    public function setActionKey($actionKey)
    {
        $this->actionKey = (int)$actionKey;
        return $this;
    }

    /**
     * @see BgColorable::setBgColor()
     */
    public function setBgColor($bgColor)
    {
        $this->bgColor = (string)$bgColor;
        return $this;
    }

    /**
     * @see Linkable::setUrl()
     */
    public function setUrl($url)
    {
        $this->url = (string)$url;
        return $this;
    }

    /**
     * @see Linkable::setUrlId()
     */
    public function setUrlId($urlId)
    {
        $this->urlId = (string)$urlId;
        return $this;
    }

    /**
     * @see Linkable::setManialink()
     */
    public function setManialink($manialink)
    {
        $this->manialink = (string)$manialink;
        return $this;
    }

    /**
     * @see Linkable::setManialinkId()
     */
    public function setManialinkId($manialinkId)
    {
        $this->manialinkId = (string)$manialinkId;
        return $this;
    }

    /**
     * @see Scriptable::setScriptEvents()
     */
    public function setScriptEvents($scriptEvents)
    {
        $this->scriptEvents = ($scriptEvents ? 1 : 0);
        return $this;
    }

    /**
     * @see SubStyleable::setStyles()
     */
    public function setStyles($style, $subStyle)
    {
        $this->setStyle($style);
        $this->setSubStyle($subStyle);
        return $this;
    }

    /**
     * @see Styleable::setStyle()
     */
    public function setStyle($style)
    {
        $this->style = (string)$style;
        return $this;
    }

    /**
     * @see SubStyleable::setSubStyle()
     */
    public function setSubStyle($subStyle)
    {
        $this->subStyle = (string)$subStyle;
        return $this;
    }

    /**
     * Set selected style
     *
     * @api
     * @param bool $styleSelected If the quad should be selected
     * @return static
     */
    public function setStyleSelected($styleSelected)
    {
        $this->styleSelected = ($styleSelected ? 1 : 0);
        return $this;
    }

    /**
     * Set the opacity
     *
     * @api
     * @param float $opacity Opacity value
     * @return static
     */
    public function setOpacity($opacity)
    {
        $this->opacity = (float)$opacity;
        return $this;
    }

    /**
     * Apply the given CheckBox Design
     *
     * @api
     * @param CheckBoxDesign $checkBoxDesign CheckBox Design
     * @return static
     */
    public function applyCheckBoxDesign(CheckBoxDesign $checkBoxDesign)
    {
        $checkBoxDesign->applyToQuad($this);
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = parent::render($domDocument);
        if ($this->image) {
            $domElement->setAttribute('image', $this->image);
        }
        if ($this->imageId) {
            $domElement->setAttribute('imageid', $this->imageId);
        }
        if ($this->imageFocus) {
            $domElement->setAttribute('imagefocus', $this->imageFocus);
        }
        if ($this->imageFocusId) {
            $domElement->setAttribute('imagefocusid', $this->imageFocusId);
        }
        if ($this->colorize) {
            $domElement->setAttribute('colorize', $this->colorize);
        }
        if ($this->modulizeColor) {
            $domElement->setAttribute('modulizecolor', $this->modulizeColor);
        }
        if (!$this->autoScale) {
            $domElement->setAttribute('autoscale', $this->autoScale);
        }
        if ($this->keepRatio) {
            $domElement->setAttribute('keepratio', $this->keepRatio);
        }
        if (strlen($this->action) > 0) {
            $domElement->setAttribute('action', $this->action);
        }
        if ($this->actionKey >= 0) {
            $domElement->setAttribute('actionkey', $this->actionKey);
        }
        if ($this->bgColor) {
            $domElement->setAttribute('bgcolor', $this->bgColor);
        }
        if ($this->url) {
            $domElement->setAttribute('url', $this->url);
        }
        if ($this->manialink) {
            $domElement->setAttribute('manialink', $this->manialink);
        }
        if ($this->scriptEvents) {
            $domElement->setAttribute('scriptevents', $this->scriptEvents);
        }
        if ($this->style) {
            $domElement->setAttribute('style', $this->style);
        }
        if ($this->subStyle) {
            $domElement->setAttribute('substyle', $this->subStyle);
        }
        if ($this->styleSelected) {
            $domElement->setAttribute('styleselected', $this->styleSelected);
        }
        if ($this->opacity !== 1.) {
            $domElement->setAttribute('opacity', $this->opacity);
        }
        return $domElement;
    }

}
