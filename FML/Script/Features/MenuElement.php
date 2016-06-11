<?php

namespace FML\Script\Features;

use FML\Controls\Control;
use FML\Types\Scriptable;

/**
 * Menu Element for the Menu Feature
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class MenuElement
{

    /*
     * Protected properties
     */
    protected $item = null;
    protected $control = null;

    /**
     * Create a new Menu Element
     *
     * @api
     * @param Control $item    (optional) Item Control in the Menu bar
     * @param Control $control (optional) Toggled Menu Control
     */
    public function __construct(Control $item = null, Control $control = null)
    {
        if ($item !== null) {
            $this->setItem($item);
        }
        if ($control !== null) {
            $this->setControl($control);
        }
    }

    /**
     * Get the Item Control
     *
     * @api
     * @return Control
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set the Item Control
     *
     * @api
     * @param Control $item Item Control in the Menu bar
     * @return static
     */
    public function setItem(Control $item)
    {
        $item->checkId();
        if ($item instanceof Scriptable) {
            $item->setScriptEvents(true);
        }
        $this->item = $item;
        return $this;
    }

    /**
     * Get the Menu Control
     *
     * @api
     * @return Control
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Set the Menu Control
     *
     * @api
     * @param Control $control Toggled Menu Control
     * @return static
     */
    public function setControl(Control $control)
    {
        $this->control = $control->checkId();
        return $this;
    }

}
