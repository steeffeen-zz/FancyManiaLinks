<?php

namespace FML\Elements;

use FML\Types\BgColorable;
use FML\Types\Renderable;
use FML\Types\Styleable;
use FML\Types\TextFormatable;

/**
 * Format Element
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Format implements BgColorable, Renderable, Styleable, TextFormatable
{

    /**
     * @var string $bgColor Background color
     */
    protected $bgColor = null;

    /**
     * @var string $style Style
     */
    protected $style = null;

    /**
     * @var int $textSize Text size
     */
    protected $textSize = null;

    /**
     * @var string $textFont Text font
     */
    protected $textFont = null;

    /**
     * @var string $textColor Text color
     */
    protected $textColor = null;

    /**
     * @var string $areaColor Area color
     */
    protected $areaColor = null;

    /**
     * @var string $focusAreaColor Focus area color
     */
    protected $focusAreaColor = null;

    /**
     * Create a new Format
     *
     * @api
     * @return static
     */
    public static function create()
    {
        return new static();
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
     * @see TextFormatable::getTextSize()
     */
    public function getTextSize()
    {
        return $this->textSize;
    }

    /**
     * @see TextFormatable::setTextSize()
     */
    public function setTextSize($textSize)
    {
        $this->textSize = (int)$textSize;
        return $this;
    }

    /**
     * @see TextFormatable::getTextFont()
     */
    public function getTextFont()
    {
        return $this->textFont;
    }

    /**
     * @see TextFormatable::setTextFont()
     */
    public function setTextFont($textFont)
    {
        $this->textFont = (string)$textFont;
        return $this;
    }

    /**
     * @see TextFormatable::getTextColor()
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * @see TextFormatable::setTextColor()
     */
    public function setTextColor($textColor)
    {
        $this->textColor = (string)$textColor;
        return $this;
    }

    /**
     * @see TextFormatable::getAreaColor()
     */
    public function getAreaColor()
    {
        return $this->areaColor;
    }

    /**
     * @see TextFormatable::setAreaColor()
     */
    public function setAreaColor($areaColor)
    {
        $this->areaColor = (string)$areaColor;
        return $this;
    }

    /**
     * @see TextFormatable::getAreaFocusColor()
     */
    public function getAreaFocusColor()
    {
        return $this->focusAreaColor;
    }

    /**
     * @see TextFormatable::setAreaFocusColor()
     */
    public function setAreaFocusColor($areaFocusColor)
    {
        $this->focusAreaColor = (string)$areaFocusColor;
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = $domDocument->createElement("format");
        if ($this->bgColor) {
            $domElement->setAttribute("bgcolor", $this->bgColor);
        }
        if ($this->style) {
            $domElement->setAttribute("style", $this->style);
        }
        if ($this->textSize) {
            $domElement->setAttribute("textsize", $this->textSize);
        }
        if ($this->textFont) {
            $domElement->setAttribute("textfont", $this->textFont);
        }
        if ($this->textColor) {
            $domElement->setAttribute("textcolor", $this->textColor);
        }
        if ($this->areaColor) {
            $domElement->setAttribute("focusareacolor1", $this->areaColor);
        }
        if ($this->focusAreaColor) {
            $domElement->setAttribute("focusareacolor2", $this->focusAreaColor);
        }
        return $domElement;
    }

}
