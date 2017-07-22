<?php

namespace FML\Script\Features;

use FML\Controls\Control;
use FML\Script\Builder;
use FML\Script\Script;
use FML\Script\ScriptLabel;

/**
 * Script Feature for toggling the complete ManiaLink via Key Press
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2017 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class ToggleInterface extends ScriptFeature
{

    /*
     * Constants
     */
    const VAR_STATE = "FML_ToggleInterface_State";

    /**
     * @var Control $control Control
     */
    protected $control = null;

    /**
     * @var string $keyName Key name
     */
    protected $keyName = null;

    /**
     * @var int $keyCode Key code
     */
    protected $keyCode = null;

    /**
     * @var bool $rememberState Remember the current state
     */
    protected $rememberState = true;

    /**
     * Construct a new ToggleInterface
     *
     * @api
     * @param Control    $control       (optional) Control
     * @param string|int $keyNameOrCode (optional) Key name or code
     * @param bool       $rememberState (optional) Remember the current state
     */
    public function __construct($control = null, $keyNameOrCode = null, $rememberState = true)
    {
        if ($control && !$control instanceof Control) {
            // backwards-compatibility - control parameter has been introduced later on
            $rememberState = $keyNameOrCode;
            $keyNameOrCode = $control;
            $control       = null;
        }
        if ($control) {
            $this->setControl($control);
        }
        if (is_string($keyNameOrCode)) {
            $this->setKeyName($keyNameOrCode);
        } else if (is_int($keyNameOrCode)) {
            $this->setKeyCode($keyNameOrCode);
        }
        $this->setRememberState($rememberState);
    }

    /**
     * Get the control
     *
     * @api
     * @return Control
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Get the control
     *
     * @api
     * @param Control $control Control
     * @return static
     */
    public function setControl(Control $control)
    {
        $this->control = $control;
        return $this;
    }

    /**
     * Get the key name
     *
     * @api
     * @return string
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * Set the key name
     *
     * @api
     * @param string $keyName Key name
     * @return static
     */
    public function setKeyName($keyName)
    {
        $this->keyName = (string)$keyName;
        $this->keyCode = null;
        return $this;
    }

    /**
     * Get the key code
     *
     * @api
     * @return int
     */
    public function getKeyCode()
    {
        return $this->keyCode;
    }

    /**
     * Set the key code
     *
     * @api
     * @param int $keyCode Key code
     * @return static
     */
    public function setKeyCode($keyCode)
    {
        $this->keyCode = (int)$keyCode;
        $this->keyName = null;
        return $this;
    }

    /**
     * Get if the state should get remembered
     *
     * @api
     * @return bool
     */
    public function getRememberState()
    {
        return $this->rememberState;
    }

    /**
     * Set if the state should get remembered
     *
     * @api
     * @param bool $rememberState Remember the current state
     * @return static
     */
    public function setRememberState($rememberState)
    {
        $this->rememberState = (bool)$rememberState;
        return $this;
    }

    /**
     * @see ScriptFeature::prepare()
     */
    public function prepare(Script $script)
    {
        $script->appendGenericScriptLabel(ScriptLabel::KeyPress, $this->getKeyPressScriptText());
        if ($this->rememberState) {
            $script->appendGenericScriptLabel(ScriptLabel::OnInit, $this->getOnInitScriptText());
        }
        return $this;
    }

    /**
     * Get the on init script text
     *
     * @return string
     */
    protected function getOnInitScriptText()
    {
        $scriptText = null;
        if ($this->control) {
            $controlId  = Builder::escapeText($this->control->getId());
            $scriptText = "declare ToggleInterfaceControl <=> Page.GetFirstChild({$controlId});";
        } else {
            $scriptText = "declare ToggleInterfaceControl <=> Page.MainFrame;";
        }
        $stateVariableName = $this::VAR_STATE;
        return $scriptText . "
declare persistent {$stateVariableName} as CurrentState for LocalUser = True;
ToggleInterfaceControl.Visible = CurrentState;
";
    }

    /**
     * Get the key press script text
     *
     * @return string
     */
    protected function getKeyPressScriptText()
    {
        $scriptText  = null;
        $keyProperty = null;
        $keyValue    = null;
        if ($this->keyName) {
            $keyProperty = "KeyName";
            $keyValue    = Builder::getText($this->keyName);
        } else if ($this->keyCode) {
            $keyProperty = "KeyCode";
            $keyValue    = Builder::getInteger($this->keyCode);
        }
        $scriptText = "
if (Event.{$keyProperty} == {$keyValue}) {
";
        if ($this->control) {
            $controlId  = Builder::escapeText($this->control->getId());
            $scriptText .= "
    declare ToggleInterfaceControl <=> Page.GetFirstChild({$controlId});";
        } else {
            $scriptText .= "
    declare ToggleInterfaceControl <=> Page.MainFrame;";
        }
        $scriptText .= "
    ToggleInterfaceControl.Visible = !ToggleInterfaceControl.Visible;";
        if ($this->rememberState) {
            $stateVariableName = static::VAR_STATE;
            $scriptText        .= "
    declare persistent {$stateVariableName} as CurrentState for LocalUser = True;
    CurrentState = ToggleInterfaceControl.Visible;
";
        }
        return $scriptText . "
}";
    }

}
