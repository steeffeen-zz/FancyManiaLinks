<?php

namespace FML\Controls;

use FML\Script\Features\Clock;
use FML\Types\Actionable;
use FML\Types\Linkable;
use FML\Types\NewLineable;
use FML\Types\Scriptable;
use FML\Types\Styleable;
use FML\Types\TextFormatable;

/**
 * Label Control
 * (CMlLabel)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Label extends Control implements Actionable, Linkable, NewLineable, Scriptable, Styleable, TextFormatable
{

    /*
     * Protected properties
     */
    protected $tagName = 'label';
    protected $text = null;
    protected $textId = null;
    protected $textPrefix = null;
    protected $textEmboss = null;
    protected $translate = null;
    protected $maxLines = -1;
    protected $opacity = 1.;
    protected $action = null;
    protected $actionKey = -1;
    protected $url = null;
    protected $urlId = null;
    protected $manialink = null;
    protected $manialinkId = null;
    protected $autoNewLine = null;
    protected $scriptEvents = null;
    protected $style = null;
    protected $textSize = -1;
    protected $textFont = null;
    protected $textColor = null;
    protected $focusAreaColor1 = null;
    protected $focusAreaColor2 = null;

    /**
     * @see Control::getManiaScriptClass()
     */
    public function getManiaScriptClass()
    {
        return 'CMlLabel';
    }

    /**
     * Set the text
     *
     * @api
     * @param string $text Text value
     * @return static
     */
    public function setText($text)
    {
        $this->text = (string)$text;
        return $this;
    }

    /**
     * Set the text id to use from Dico
     *
     * @api
     * @param string $textId Text id
     * @return static
     */
    public function setTextId($textId)
    {
        $this->textId = (string)$textId;
        return $this;
    }

    /**
     * Set the text prefix
     *
     * @api
     * @param string $textPrefix Text prefix
     * @return static
     */
    public function setTextPrefix($textPrefix)
    {
        $this->textPrefix = (string)$textPrefix;
        return $this;
    }

    /**
     * Set text emboss
     *
     * @api
     * @param bool $textEmboss If the text should be embossed
     * @return static
     */
    public function setTextEmboss($textEmboss)
    {
        $this->textEmboss = ($textEmboss ? 1 : 0);
        return $this;
    }

    /**
     * Set translate
     *
     * @api
     * @param bool $translate If the text should be translated
     * @return static
     */
    public function setTranslate($translate)
    {
        $this->translate = ($translate ? 1 : 0);
        return $this;
    }

    /**
     * Set the max lines count
     *
     * @api
     * @param int $maxLines Max lines count
     * @return static
     */
    public function setMaxLines($maxLines)
    {
        $this->maxLines = (int)$maxLines;
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
     * @see TextFormatable::setTextColor()
     */
    public function setTextColor($textColor)
    {
        $this->textColor = (string)$textColor;
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
     * Add a dynamic Feature showing the current time
     *
     * @api
     * @param bool $showSeconds  (optional) If the seconds should be shown
     * @param bool $showFullDate (optional) If the date should be shown
     * @return static
     */
    public function addClockFeature($showSeconds = true, $showFullDate = false)
    {
        $clock = new Clock($this, $showSeconds, $showFullDate);
        $this->addScriptFeature($clock);
        return $this;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = parent::render($domDocument);
        if (strlen($this->text) > 0) {
            $domElement->setAttribute('text', $this->text);
        }
        if ($this->textId) {
            $domElement->setAttribute('textid', $this->textId);
        }
        if ($this->textPrefix) {
            $domElement->setAttribute('textprefix', $this->textPrefix);
        }
        if ($this->textEmboss) {
            $domElement->setAttribute('textemboss', $this->textEmboss);
        }
        if ($this->translate) {
            $domElement->setAttribute('translate', $this->translate);
        }
        if ($this->maxLines >= 0) {
            $domElement->setAttribute('maxlines', $this->maxLines);
        }
        if ($this->opacity != 1.) {
            $domElement->setAttribute('opacity', $this->opacity);
        }
        if (strlen($this->action) > 0) {
            $domElement->setAttribute('action', $this->action);
        }
        if ($this->actionKey >= 0) {
            $domElement->setAttribute('actionkey', $this->actionKey);
        }
        if ($this->url) {
            $domElement->setAttribute('url', $this->url);
        }
        if ($this->manialink) {
            $domElement->setAttribute('manialink', $this->manialink);
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
        if ($this->textSize >= 0) {
            $domElement->setAttribute('textsize', $this->textSize);
        }
        if ($this->textFont) {
            $domElement->setAttribute('textfont', $this->textFont);
        }
        if ($this->textColor) {
            $domElement->setAttribute('textcolor', $this->textColor);
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
