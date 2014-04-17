<?php

namespace FML\Script;

/**
 * Class representing a Part of the ManiaLink Script
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class ScriptLabel {
	/*
	 * Constants
	 */
	const ONINIT = 'FML_OnInit';
	const LOOP = 'FML_Loop';
	const TICK = 'FML_Tick';
	const ENTRYSUBMIT = 'FML_EntrySubmit';
	const KEYPRESS = 'FML_KeyPress';
	const MOUSECLICK = 'FML_MouseClick';
	const MOUSEOUT = 'FML_MouseOut';
	const MOUSEOVER = 'FML_MouseOver';
	
	/*
	 * Public Properties
	 */
	protected $name = null;
	protected $text = null;

	/**
	 * Construct a new ScriptLabel
	 * 
	 * @param string $name (optional) Label Name
	 * @param string $text (optional) Script Text
	 */
	public function __construct($name = self::LOOP, $text = '') {
		$this->name = $name;
		$this->text = $text;
	}

	/**
	 * Set the Name
	 *
	 * @param string $name Label Name
	 * @return \FML\Script\ScriptLabel
	 */
	public function setName($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * Set the Text
	 *
	 * @param string $text Script Text
	 * @return \FML\Script\ScriptLabel
	 */
	public function setText($text) {
		$this->text = $text;
		return $this;
	}
	
	/**
	 * Build the full Script Label Text
	 * 
	 * @return string
	 */
	public function __toString() {
		$scriptText = Builder::getLabelImplementationBlock($this->name, $this->text);
		return $scriptText;
	}
}
