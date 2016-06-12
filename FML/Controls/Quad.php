<?php

namespace FML\Controls;

use FML\Components\CheckBoxDesign;
use FML\Types\Actionable;
use FML\Types\BgColorable;
use FML\Types\Imageable;
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
class Quad extends Control implements Actionable, BgColorable, Imageable, Linkable, Scriptable, Styleable, SubStyleable
{

    /*
     * Constants
     */
    const KEEP_RATIO_INACTIVE = "inactive";
    const KEEP_RATIO_CLIP     = "Clip";
    const KEEP_RATIO_FIT      = "Fit";

    /**
     * @var string $imageUrl Image url
     */
    protected $imageUrl = null;

    /**
     * @var string $imageId Image id
     */
    protected $imageId = null;

    /**
     * @var string $imageFocusUrl Focus image url
     */
    protected $imageFocusUrl = null;

    /**
     * @var string $imageFocusId Focus image id
     */
    protected $imageFocusId = null;

    /**
     * @var string $colorize Colorize value
     */
    protected $colorize = null;

    /**
     * @var string $modulizeColor Modulization color
     */
    protected $modulizeColor = null;

    /**
     * @var bool $autoScale Automatic scaling
     */
    protected $autoScale = true;

    /**
     * @var string $keepRatio Keep ratio mode
     */
    protected $keepRatio = null;

    /**
     * @var string $action Action name
     */
    protected $action = null;

    /**
     * @var int $actionKey Action key
     */
    protected $actionKey = null;

    /**
     * @var string $bgColor Background color
     */
    protected $bgColor = null;

    /**
     * @var string $url Link url
     */
    protected $url = null;

    /**
     * @var string $urlId Link url id
     */
    protected $urlId = null;

    /**
     * @var string $manialink Manialink
     */
    protected $manialink = null;

    /**
     * @var string $manialinkId Manialink id
     */
    protected $manialinkId = null;

    /**
     * @var bool $scriptEvents Script events activation
     */
    protected $scriptEvents = null;

    /**
     * @var string $style Style
     */
    protected $style = null;

    /**
     * @var string $subStyle SubStyle
     */
    protected $subStyle = null;

    /**
     * @var bool $styleSelected Style selected
     */
    protected $styleSelected = null;

    /**
     * @var float $opacity Opacity
     */
    protected $opacity = null;

    /**
     * @see Control::getTagName()
     */
    public static function getTagName()
    {
        return "quad";
    }

    /**
     * @see Control::getManiaScriptClass()
     */
    public static function getManiaScriptClass()
    {
        return "CMlQuad";
    }

    /**
     * @see Imageable::getImageUrl()
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @see Imageable::setImageUrl()
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = (string)$imageUrl;
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
     * @param string $imageFocusUrl Focus image url
     * @return static
     */
    public function setImageFocusUrl($imageFocusUrl)
    {
        $this->imageFocusUrl = (string)$imageFocusUrl;
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
     * Set the modulization color
     *
     * @api
     * @param string $modulizeColor Modulization color
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
        $this->autoScale = (bool)$autoScale;
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
     * @see BgColorable::getBgColor()
     */
    public function getBgColor()
    {
        return $this->bgColor;
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
        $this->scriptEvents = (bool)$scriptEvents;
        return $this;
    }

    /**
     * @see Styleable::getStyle()
     */
    public function getStyle()
    {
        return $this->style;
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
     * @see Styleable::getSubStyle()
     */
    public function getSubStyle()
    {
        return $this->subStyle;
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
     * @see SubStyleable::setStyles()
     */
    public function setStyles($style, $subStyle)
    {
        return $this->setStyle($style)
                    ->setSubStyle($subStyle);
    }

    /**
     * Set selected style
     *
     * @api
     * @param bool $styleSelected If the quad should be styled selected
     * @return static
     */
    public function setStyleSelected($styleSelected)
    {
        $this->styleSelected = (bool)$styleSelected;
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
        if ($this->imageUrl) {
            $domElement->setAttribute("image", $this->imageUrl);
        }
        if ($this->imageId) {
            $domElement->setAttribute("imageid", $this->imageId);
        }
        if ($this->imageFocusUrl) {
            $domElement->setAttribute("imagefocus", $this->imageFocusUrl);
        }
        if ($this->imageFocusId) {
            $domElement->setAttribute("imagefocusid", $this->imageFocusId);
        }
        if ($this->colorize) {
            $domElement->setAttribute("colorize", $this->colorize);
        }
        if ($this->modulizeColor) {
            $domElement->setAttribute("modulizecolor", $this->modulizeColor);
        }
        if (!$this->autoScale) {
            $domElement->setAttribute("autoscale", 0);
        }
        if ($this->keepRatio) {
            $domElement->setAttribute("keepratio", $this->keepRatio);
        }
        if ($this->action) {
            $domElement->setAttribute("action", $this->action);
        }
        if ($this->actionKey) {
            $domElement->setAttribute("actionkey", $this->actionKey);
        }
        if ($this->bgColor) {
            $domElement->setAttribute("bgcolor", $this->bgColor);
        }
        if ($this->url) {
            $domElement->setAttribute("url", $this->url);
        }
        if ($this->manialink) {
            $domElement->setAttribute("manialink", $this->manialink);
        }
        if ($this->scriptEvents) {
            $domElement->setAttribute("scriptevents", 1);
        }
        if ($this->style) {
            $domElement->setAttribute("style", $this->style);
        }
        if ($this->subStyle) {
            $domElement->setAttribute("substyle", $this->subStyle);
        }
        if ($this->styleSelected) {
            $domElement->setAttribute("styleselected", 1);
        }
        if ($this->opacity !== 1.) {
            $domElement->setAttribute("opacity", $this->opacity);
        }
        return $domElement;
    }

}
