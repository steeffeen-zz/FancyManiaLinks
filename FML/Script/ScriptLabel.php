<?php

namespace FML\Script;

/**
 * Class representing a part of the ManiaLink Script
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2017 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class ScriptLabel
{

    /*
     * Constants
     */
    const OnInit      = "FML_OnInit";
    const Loop        = "FML_Loop";
    const Tick        = "FML_Tick";
    const EntrySubmit = "FML_EntrySubmit";
    const KeyPress    = "FML_KeyPress";
    const MouseClick  = "FML_MouseClick";
    const MouseClick2 = "FML_MouseClick2";
    const MouseOut    = "FML_MouseOut";
    const MouseOver   = "FML_MouseOver";

    /**
     * @deprecated Use ScriptLabel::OnInit
     */
    const ONINIT = "FML_OnInit";
    /**
     * @deprecated Use ScriptLabel::Loop
     */
    const LOOP = "FML_Loop";
    /**
     * @deprecated Use ScriptLabel::Tick
     */
    const TICK = "FML_Tick";
    /**
     * @deprecated Use ScriptLabel::EntrySubmit
     */
    const ENTRYSUBMIT = "FML_EntrySubmit";
    /**
     * @deprecated Use ScriptLabel::KeyPress
     */
    const KEYPRESS = "FML_KeyPress";
    /**
     * @deprecated Use ScriptLabel::MouseClick
     */
    const MOUSECLICK = "FML_MouseClick";
    /**
     * @deprecated Use ScriptLabel::MouseClick2
     */
    const MOUSECLICK2 = "FML_MouseClick2";
    /**
     * @deprecated Use ScriptLabel::MouseOut
     */
    const MOUSEOUT = "FML_MouseOut";
    /**
     * @deprecated Use ScriptLabel::MouseOver
     */
    const MOUSEOVER = "FML_MouseOver";

    /**
     * @var string $name Label name
     */
    protected $name = null;

    /**
     * @var string $text Script text
     */
    protected $text = null;

    /**
     * @var bool $isolated Isolate the script
     */
    protected $isolated = null;

    /**
     * Construct a new ScriptLabel
     *
     * @api
     * @param string $name     (optional) Label name
     * @param string $text     (optional) Script text
     * @param bool   $isolated (optional) Isolate the script
     */
    public function __construct($name = self::LOOP, $text = null, $isolated = null)
    {
        if ($name) {
            $this->setName($name);
        }
        if ($text) {
            $this->setText($text);
        }
        if ($isolated) {
            $this->setIsolated($isolated);
        }
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
     * @param string $name Label name
     * @return static
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    /**
     * Get the text
     *
     * @api
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the text
     *
     * @api
     * @param string $text Script text
     * @return static
     */
    public function setText($text)
    {
        $this->text = (string)$text;
        return $this;
    }

    /**
     * Get isolation
     *
     * @api
     * @return bool
     */
    public function getIsolated()
    {
        return $this->isolated;
    }

    /**
     * Set isolation
     *
     * @api
     * @param bool $isolated If the code should be isolated in an own block
     * @return static
     */
    public function setIsolated($isolated)
    {
        $this->isolated = (bool)$isolated;
        return $this;
    }

    /**
     * Build the full Script Label text
     *
     * @return string
     */
    public function __toString()
    {
        return Builder::getLabelImplementationBlock($this->name, $this->text, $this->isolated);
    }

    /**
     * Get the possible event label names
     *
     * @return string[]
     */
    public static function getEventLabels()
    {
        return array(self::ENTRYSUBMIT, self::KEYPRESS, self::MOUSECLICK, self::MOUSEOUT, self::MOUSEOVER);
    }

    /**
     * Check if the given label name describes an event label
     *
     * @param string $label Label name
     * @return bool
     */
    public static function isEventLabel($label)
    {
        if (in_array($label, static::getEventLabels())) {
            return true;
        }
        return false;
    }

}
