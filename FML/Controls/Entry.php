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
    protected $tagName = 'entry';
    protected $name = null;
    protected $default = null;
    protected $autoNewLine = null;
    protected $scriptEvents = null;
    protected $style = null;
    protected $textColor = null;
    protected $textSize = -1;
    protected $textFont = null;
    protected $focusAreaColor1 = null;
    protected $focusAreaColor2 = null;
    protected $autoComplete = null;

    /**
     * @see Control::getManiaScriptClass()
     */
    public function getManiaScriptClass()
    {
        return 'CMlEntry';
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
     * @see Styleable::setStyle()
     */
    public function setStyle($style)
    {
        $this->style = (string)$style;
        return $this;
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
     * @see TextFormatable::setTextSize()
     */
    public function setTextSize($textSize)
    {
        $this->textSize = (int)$textSize;
        return $this;
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
     * @see TextFormatable::setAreaColor()
     */
    public function setAreaColor($areaColor)
    {
        $this->focusAreaColor1 = (string)$areaColor;
        return $this;
    }

    /**
     * @see TextFormatable::setAreaFocusColor()
     */
    public function setAreaFocusColor($areaFocusColor)
    {
        $this->focusAreaColor2 = (string)$areaFocusColor;
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
            $domElement->setAttribute('name', $this->name);
        }
        if ($this->default !== null) {
            $domElement->setAttribute('default', $this->default);
        } else if ($this->autoComplete) {
            $value = null;
            if (array_key_exists($this->name, $_GET)) {
                $value = $_GET[$this->name];
            } else if (array_key_exists($this->name, $_POST)) {
                $value = $_POST[$this->name];
            }
            if ($value) {
                $domElement->setAttribute('default', $value);
            }
        }
        if ($this->autoNewLine) {
            $domElement->setAttribute('autonewline', $this->autoNewLine);
        }
        if ($this->scriptEvents) {
            $domElement->setAttribute('scriptevents', $this->scriptEvents);
        }
        if ($this->style) {
            $domElement->setAttribute('style', $this->style);
        }
        if ($this->textColor) {
            $domElement->setAttribute('textcolor', $this->textColor);
        }
        if ($this->textSize >= 0.) {
            $domElement->setAttribute('textsize', $this->textSize);
        }
        if ($this->textFont) {
            $domElement->setAttribute('textfont', $this->textFont);
        }
        if ($this->focusAreaColor1) {
            $domElement->setAttribute('focusareacolor1', $this->focusAreaColor1);
        }
        if ($this->focusAreaColor2) {
            $domElement->setAttribute('focusareacolor2', $this->focusAreaColor2);
        }
        return $domElement;
    }

}
