<?php

namespace FML\Controls;

use FML\Script\Builder;
use FML\Script\Features\ActionTrigger;
use FML\Script\Features\ControlScript;
use FML\Script\Features\MapInfo;
use FML\Script\Features\PlayerProfile;
use FML\Script\Features\ScriptFeature;
use FML\Script\Features\Toggle;
use FML\Script\Features\Tooltip;
use FML\Script\Features\UISound;
use FML\Script\ScriptLabel;
use FML\Types\Identifiable;
use FML\Types\Renderable;
use FML\Types\ScriptFeatureable;
use FML\UniqueID;

/**
 * Base Control
 * (CMlControl)
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
abstract class Control implements Identifiable, Renderable, ScriptFeatureable
{

    /*
     * Constants
     */
    const CENTER  = 'center';
    const CENTER2 = 'center2';
    const TOP     = 'top';
    const RIGHT   = 'right';
    const BOTTOM  = 'bottom';
    const LEFT    = 'left';

    /**
     * @var string $controlId Control Id
     */
    protected $controlId = null;

    /**
     * @var float $posX X position
     */
    protected $posX = 0.;

    /**
     * @var float $posY Y position
     */
    protected $posY = 0.;

    /**
     * @var float $posZ Z position
     */
    protected $posZ = 0.;

    /**
     * @var float $width Width
     */
    protected $width = -1.;

    /**
     * @var float $height Height
     */
    protected $height = -1.;

    /**
     * @var string $hAlign Horizontal alignment
     */
    protected $hAlign = self::CENTER;

    /**
     * @var string $vAlign Vertical alignment
     */
    protected $vAlign = self::CENTER2;

    /**
     * @var float $scale Scale
     */
    protected $scale = 1.;

    /**
     * @var bool $hidden Hidden
     */
    protected $hidden = null;

    /**
     * @var float $rotation Rotation
     */
    protected $rotation = 0.;

    /**
     * @var string[] $classes Style classes
     */
    protected $classes = array();

    /**
     * @var ScriptFeature[] $scriptFeatures Script Features
     */
    protected $scriptFeatures = array();

    /**
     * Create a new Control
     *
     * @api
     * @param string $controlId (optional) Control Id
     * @return static
     */
    public static function create($controlId = null)
    {
        return new static($controlId);
    }

    /**
     * Construct a new Control
     *
     * @api
     * @param string $controlId (optional) Control Id
     */
    public function __construct($controlId = null)
    {
        if ($controlId) {
            $this->setId($controlId);
        }
    }

    /**
     * Get the Control id
     *
     * @api
     * @param bool $escaped        (optional) Escape the id for ManiaScript
     * @param bool $addApostrophes (optional) Add apostrophes before and after the text
     * @return string
     */
    public function getId($escaped = false, $addApostrophes = false)
    {
        if ($escaped) {
            return Builder::escapeText($this->controlId, $addApostrophes);
        }
        return $this->controlId;
    }

    /**
     * @see Identifiable::setId()
     */
    public function setId($controlId)
    {
        $this->controlId = (string)$controlId;
        return $this;
    }

    /**
     * @see Identifiable::checkId()
     */
    public function checkId()
    {
        return UniqueID::check($this);
    }

    /**
     * Set the Control position
     *
     * @api
     * @param float $posX Horizontal position
     * @param float $posY Vertical position
     * @param float $posZ (optional) Depth
     * @return static
     */
    public function setPosition($posX, $posY, $posZ = null)
    {
        $this->setX($posX);
        $this->setY($posY);
        if ($posZ !== null) {
            $this->setZ($posZ);
        }
        return $this;
    }

    /**
     * Set the X position
     *
     * @api
     * @param float $posX Horizontal position
     * @return static
     */
    public function setX($posX)
    {
        $this->posX = (float)$posX;
        return $this;
    }

    /**
     * Set the Y position
     *
     * @api
     * @param float $posY Vertical position
     * @return static
     */
    public function setY($posY)
    {
        $this->posY = (float)$posY;
        return $this;
    }

    /**
     * Set the Z position
     *
     * @api
     * @param float $posZ Depth
     * @return static
     */
    public function setZ($posZ)
    {
        $this->posZ = (float)$posZ;
        return $this;
    }

    /**
     * Set the size
     *
     * @api
     * @param float $width  Control width
     * @param float $height Control height
     * @return static
     */
    public function setSize($width, $height)
    {
        return $this->setWidth($width)
                    ->setHeight($height);
    }

    /**
     * Set the width
     *
     * @api
     * @param float $width Control width
     * @return static
     */
    public function setWidth($width)
    {
        $this->width = (float)$width;
        return $this;
    }

    /**
     * Set the height
     *
     * @api
     * @param float $height Control height
     * @return static
     */
    public function setHeight($height)
    {
        $this->height = (float)$height;
        return $this;
    }

    /**
     * Set the horizontal alignment
     *
     * @api
     * @param string $hAlign Horizontal alignment
     * @return static
     */
    public function setHAlign($hAlign)
    {
        $this->hAlign = (string)$hAlign;
        return $this;
    }

    /**
     * Set the vertical alignment
     *
     * @api
     * @param string $vAlign Vertical alignment
     * @return static
     */
    public function setVAlign($vAlign)
    {
        $this->vAlign = (string)$vAlign;
        return $this;
    }

    /**
     * Center the alignment
     *
     * @api
     * @return static
     */
    public function centerAlign()
    {
        return $this->setAlign(self::CENTER, self::CENTER2);
    }

    /**
     * Set the horizontal and the vertical alignment
     *
     * @api
     * @param string $hAlign Horizontal alignment
     * @param string $vAlign Vertical alignment
     * @return static
     */
    public function setAlign($hAlign, $vAlign)
    {
        return $this->setHAlign($hAlign)
                    ->setVAlign($vAlign);
    }

    /**
     * Clear the alignment
     *
     * @api
     * @return static
     */
    public function clearAlign()
    {
        return $this->setAlign(null, null);
    }

    /**
     * Set the scale
     *
     * @api
     * @param float $scale Control scale
     * @return static
     */
    public function setScale($scale)
    {
        $this->scale = (float)$scale;
        return $this;
    }

    /**
     * Set the visibility
     *
     * @api
     * @param bool $visible If the Control should be visible
     * @return static
     */
    public function setVisible($visible = true)
    {
        $this->hidden = ($visible ? 0 : 1);
        return $this;
    }

    /**
     * Set the rotation
     *
     * @api
     * @param float $rotation Control rotation
     * @return static
     */
    public function setRotation($rotation)
    {
        $this->rotation = (float)$rotation;
        return $this;
    }

    /**
     * Add a new style class
     *
     * @api
     * @param string $class Style class name
     * @return static
     */
    public function addClass($class)
    {
        $class = (string)$class;
        if (!in_array($class, $this->classes)) {
            array_push($this->classes, $class);
        }
        return $this;
    }

    /**
     * Add a dynamic Action Trigger
     *
     * @api
     * @param string $actionName Action to trigger
     * @param string $eventLabel (optional) Event on which the action is triggered
     * @return static
     */
    public function addActionTriggerFeature($actionName, $eventLabel = ScriptLabel::MOUSECLICK)
    {
        if ($actionName instanceof ActionTrigger) {
            $this->addScriptFeature($actionName);
        } else {
            $actionTrigger = new ActionTrigger($actionName, $this, $eventLabel);
            $this->addScriptFeature($actionTrigger);
        }
        return $this;
    }

    /**
     * Add a new Script Feature
     *
     * @api
     * @param ScriptFeature $scriptFeature Script Feature
     * @return static
     */
    public function addScriptFeature(ScriptFeature $scriptFeature)
    {
        if (!in_array($scriptFeature, $this->scriptFeatures, true)) {
            array_push($this->scriptFeatures, $scriptFeature);
        }
        return $this;
    }

    /**
     * Add a dynamic Feature opening the current map info
     *
     * @api
     * @param string $eventLabel (optional) Event on which the map info will be opened
     * @return static
     */
    public function addMapInfoFeature($eventLabel = ScriptLabel::MOUSECLICK)
    {
        $mapInfo = new MapInfo($this, $eventLabel);
        $this->addScriptFeature($mapInfo);
        return $this;
    }

    /**
     * Add a dynamic Feature to open a specific player profile
     *
     * @api
     * @param string $login      Login of the player
     * @param string $eventLabel (optional) Event on which the player profile will be opened
     * @return static
     */
    public function addPlayerProfileFeature($login, $eventLabel = ScriptLabel::MOUSECLICK)
    {
        $playerProfile = new PlayerProfile($login, $this, $eventLabel);
        $this->addScriptFeature($playerProfile);
        return $this;
    }

    /**
     * Add a dynamic Feature playing a UISound
     *
     * @api
     * @param string $soundName  UISound name
     * @param int    $variant    (optional) Sound variant
     * @param string $eventLabel (optional) Event on which the sound will be played
     * @return static
     */
    public function addUISoundFeature($soundName, $variant = 0, $eventLabel = ScriptLabel::MOUSECLICK)
    {
        $uiSound = new UISound($soundName, $this, $variant, $eventLabel);
        $this->addScriptFeature($uiSound);
        return $this;
    }

    /**
     * Add a dynamic Feature toggling another Control
     *
     * @api
     * @param Control $toggledControl Toggled Control
     * @param string  $labelName      (optional) Script label name
     * @param bool    $onlyShow       (optional) If it should only show the Control but not toggle
     * @param bool    $onlyHide       (optional) If it should only hide the Control but not toggle
     * @return static
     */
    public function addToggleFeature(Control $toggledControl, $labelName = ScriptLabel::MOUSECLICK, $onlyShow = false, $onlyHide = false)
    {
        $toggle = new Toggle($this, $toggledControl, $labelName, $onlyShow, $onlyHide);
        $this->addScriptFeature($toggle);
        return $this;
    }

    /**
     * Add a dynamic Feature showing a Tooltip on hovering
     *
     * @api
     * @param Control $tooltipControl Tooltip Control
     * @param bool    $stayOnClick    (optional) Whether the Tooltip should stay on click
     * @param bool    $invert         (optional) Whether the visibility toggling should be inverted
     * @return static
     */
    public function addTooltipFeature(Control $tooltipControl, $stayOnClick = false, $invert = false)
    {
        $tooltip = new Tooltip($this, $tooltipControl, $stayOnClick, $invert);
        $this->addScriptFeature($tooltip);
        return $this;
    }

    /**
     * Add a dynamic Feature showing a Tooltip on hovering
     *
     * @api
     * @param Label  $tooltipControl Tooltip Control
     * @param string $text           Text to display on the Tooltip Label
     * @param bool   $stayOnClick    (optional) Whether the Tooltip should stay on click
     * @param bool   $invert         (optional) Whether the visibility toggling should be inverted
     * @return static
     */
    public function addTooltipLabelFeature(Label $tooltipControl, $text, $stayOnClick = false, $invert = false)
    {
        $tooltip = new Tooltip($this, $tooltipControl, $stayOnClick, $invert, $text);
        $this->addScriptFeature($tooltip);
        return $this;
    }

    /**
     * Add a custom Control Script text part
     *
     * @api
     * @param string $scriptText Script text
     * @param string $label      (optional) Script label name
     * @return static
     */
    public function addScriptText($scriptText, $label = ScriptLabel::MOUSECLICK)
    {
        $customText = new ControlScript($this, $scriptText, $label);
        $this->addScriptFeature($customText);
        return $this;
    }

    /**
     * Remove all Script Features
     *
     * @api
     * @return static
     */
    public function removeScriptFeatures()
    {
        $this->scriptFeatures = array();
        return $this;
    }

    /**
     * @see ScriptFeatureable::getScriptFeatures()
     */
    public function getScriptFeatures()
    {
        return $this->scriptFeatures;
    }

    /**
     * @see Renderable::render()
     */
    public function render(\DOMDocument $domDocument)
    {
        $domElement = $domDocument->createElement($this->getTagName());
        if ($this->controlId) {
            $domElement->setAttribute('id', $this->controlId);
        }
        if ($this->posX || $this->posY || $this->posZ) {
            $domElement->setAttribute('posn', "{$this->posX} {$this->posY} {$this->posZ}");
        }
        if ($this->width >= 0. || $this->height >= 0.) {
            $domElement->setAttribute('sizen', "{$this->width} {$this->height}");
        }
        if ($this->hAlign) {
            $domElement->setAttribute('halign', $this->hAlign);
        }
        if ($this->vAlign) {
            $domElement->setAttribute('valign', $this->vAlign);
        }
        if ($this->scale != 1.) {
            $domElement->setAttribute('scale', $this->scale);
        }
        if ($this->hidden) {
            $domElement->setAttribute('hidden', $this->hidden);
        }
        if ($this->rotation) {
            $domElement->setAttribute('rot', $this->rotation);
        }
        if (!empty($this->classes)) {
            $classes = implode(' ', $this->classes);
            $domElement->setAttribute('class', $classes);
        }
        return $domElement;
    }

    /**
     * Get the tag name of the Control
     *
     * @return string
     */
    abstract public function getTagName();

    /**
     * Get the ManiaScript class of the Control
     *
     * @return string
     */
    abstract public function getManiaScriptClass();

}
