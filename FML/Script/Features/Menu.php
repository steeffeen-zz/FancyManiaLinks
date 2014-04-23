<?php

namespace FML\Script\Features;

use FML\Controls\Control;
use FML\Script\Script;
use FML\Script\ScriptLabel;
use FML\Script\Builder;
use FML\Types\Scriptable;
use FML\Controls\Label;
use FML\Script\ScriptInclude;

/**
 * Script Feature realising a Menu showing specific Controls for the different Item Controls
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Menu extends ScriptFeature {
	/*
	 * Protected Properties
	 */
	protected $elements = array();

	/**
	 * Construct a new Menu Feature
	 *
	 * @param Control $item (optional) Item Control in the Menu Bar
	 * @param Control $control (optional) Toggled Menu Control
	 */
	public function __construct(Control $item = null, Control $control = null) {
		if ($item && $control) {
			$this->addNewElement($item, $control);
		}
	}

	/**
	 * Add a new Element to the Menu
	 *
	 * @param Control $item Item Control in the Menu Bar
	 * @param Control $control Toggled Menu Control
	 * @return \FML\Script\Features\Menu
	 */
	public function addElement(Control $item, Control $control) {
		$menuElement = new MenuElement($item, $control);
		$this->appendElement($menuElement);
		return $this;
	}

	/**
	 * Append an Element to the Menu
	 *
	 * @param MenuElement $menuElement Menu Element
	 * @return \FML\Script\Features\Menu
	 */
	public function appendElement(MenuElement $menuElement) {
		array_push($this->elements, $menuElement);
		return $this;
	}

	/**
	 *
	 * @see \FML\Script\Features\ScriptFeature::prepare()
	 */
	public function prepare(Script $script) {
		$script->appendGenericScriptLabel(ScriptLabel::MOUSECLICK, $this->getScriptText(), true);
		return $this;
	}

	/**
	 * Get the Script Text
	 *
	 * @return string
	 */
	protected function getScriptText() {
		$elementsArrayText = $this->getElementsArrayText();
		$scriptText = "
declare MenuElements = {$elementsArrayText};
if (MenuElements.existskey(Event.Control.ControlId)) {
	declare ShownControlId = MenuElements[Event.Control.ControlId];
	foreach (ItemId => ControlId in MenuElements) {
		declare Control <=> (Page.GetFirstChild(ControlId));
		Control.Visible = (ControlId == ShownControlId);
	} 
}";
		return $scriptText;
	}

	/**
	 * Build the Array Text for the Elements
	 *
	 * @return string
	 */
	protected function getElementsArrayText() {
		$elements = array();
		foreach ($this->elements as $element) {
			$elements[$element->getItem()->getId()] = $element->getControl()->getId();
		}
		return Builder::getArray($elements, true);
	}
}
