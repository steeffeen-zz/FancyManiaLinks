<?php

namespace FML\Controls;

use FML\Script\Features\EntrySubmit;
use FML\Types\NewLineable;
use FML\Types\Scriptable;
use FML\Types\Styleable;
use FML\Types\TextFormatable;

/**
 * Entry Control
 * (CMlEntry)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Entry extends Control implements NewLineable, Scriptable, Styleable, TextFormatable
{

    /*
     * Protected properties
     */
    /**
     * @var string $name Entry name
     */
    protected $name = null;

    /**
     * @var string $default Default value
     */
    protected $default = null;
    protected $autoNewLine = null;
    protected $scriptEvents = null;

    /**
     * @var string $style Style
     */
    protected $style = null;

    /**
     * @var string $textColor Text color
     */
    protected $textColor = null;

    /**
     * @var int $textSize Text size
     */
    protected $textSize = -1;

    /**
     * @var string $textFont Text font
     */
    protected $textFont = null;

    /**
     * @var string $areaColor Area color
     */
    protected $areaColor = null;

    /**
     * @var string $focusAreaColor Focus area color
     */
    protected $focusAreaColor = null;

    protected $autoComplete = null;

    /**
     * @see Control::getTagName()
     */
    public static function getTagName()
    {
        return "entry";
    }

    /**
     * @see Control::getManiaScriptClass()
     */
    public static function getManiaScriptClass()
    {
        return "CMlEntry";
    }

    /**
     * Get the name
     *
     * @api
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @api
     * @param string $name Entry name
     * @return static
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    /**
     * Get the default value
     *
     * @api
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set the default value
     *
     * @api
     * @param string $default Default value
     * @return static
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * @see NewLineable::setAutoNewLine()
     */
    public function setAutoNewLine($autoNewLine)
    {
        $this->autoNewLine = ($autoNewLine ? 1 : 0);
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
     * Set auto completion
     *
     * @api
     * @param bool $autoComplete Automatically complete the default value based on the current request parameters
     * @return static
     */
    public function setAutoComplete($autoComplete)
    {
        $this->autoComplete = (bool)$autoComplete;
        return $this;
    }

    /**
     * Add a dynamic Feature submitting the Entry
     *
     * @api
     * @param string $url Submit url
     * @return static
     */
    public function addSubmitFeature($url)
    {
        $entrySubmit = new EntrySubmit($this, $url);
        $this->addScriptFeature($entrySubmit);
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = parent::render($domDocument);
        if ($this->name) {
            $domElement->setAttribute("name", $this->name);
        }
        if ($this->default !== null) {
            $domElement->setAttribute("default", $this->default);
        } else if ($this->autoComplete) {
            $value = null;
            if (array_key_exists($this->name, $_GET)) {
                $value = $_GET[$this->name];
            } else if (array_key_exists($this->name, $_POST)) {
                $value = $_POST[$this->name];
            }
            if ($value) {
                $domElement->setAttribute("default", $value);
            }
        }
        if ($this->autoNewLine) {
            $domElement->setAttribute("autonewline", $this->autoNewLine);
        }
        if ($this->scriptEvents) {
            $domElement->setAttribute("scriptevents", $this->scriptEvents);
        }
        if ($this->style) {
            $domElement->setAttribute("style", $this->style);
        }
        if ($this->textColor) {
            $domElement->setAttribute("textcolor", $this->textColor);
        }
        if ($this->textSize >= 0.) {
            $domElement->setAttribute("textsize", $this->textSize);
        }
        if ($this->textFont) {
            $domElement->setAttribute("textfont", $this->textFont);
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
