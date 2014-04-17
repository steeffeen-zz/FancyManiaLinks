<?php

namespace FML\Script;

/**
 * Class representing the ManiaLink Script
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Script {
	/*
	 * Protected Properties
	 */
	protected $tagName = 'script';
	protected $includes = array();
	protected $constants = array();
	protected $functions = array();
	protected $customLabels = array();
	protected $genericLabels = array();

	/**
	 * Add a Script Include
	 *
	 * @param string $file Include File
	 * @param string $namespace Include Namespace
	 * @return \FML\Script\Script
	 */
	public function addScriptInclude($file, $namespace = null) {
		if (is_object($file) && ($file instanceof ScriptInclude)) {
			$scriptInclude = $file;
		}
		else {
			$scriptInclude = new ScriptInclude($file, $namespace);
		}
		array_push($this->includes, $scriptInclude);
		return $this;
	}

	/**
	 * Add a Script Constant
	 *
	 * @param string $name Constant Name
	 * @param string $value Constant Value
	 * @return \FML\Script\Script
	 */
	public function addScriptConstant($name, $value = null) {
		if (is_object($name) && ($name instanceof ScriptConstant)) {
			$scriptConstant = $name;
		}
		else {
			$scriptConstant = new ScriptConstant($name, $value);
		}
		array_push($this->constants, $scriptConstant);
		return $this;
	}

	/**
	 * Add a Script Function
	 *
	 * @param string $name Function Name
	 * @param string $text Function Text
	 * @return \FML\Script\Script
	 */
	public function addScriptFunction($name, $text = null) {
		if (is_object($name) && ($name instanceof ScriptFunction)) {
			$scriptFunction = $name;
		}
		else {
			$scriptFunction = new ScriptFunction($name, $value);
		}
		array_push($this->functions, $scriptFunction);
		return $this;
	}

	/**
	 * Add a custom Script Text
	 *
	 * @param string $name Label Name
	 * @param string $text Script Text
	 * @return \FML\Script\Script
	 */
	public function addCustomScriptLabel($name, $text = null) {
		if (is_object($name) && ($name instanceof ScriptLabel)) {
			$scriptLabel = $name;
		}
		else {
			$scriptLabel = new ScriptLabel($name, $text);
		}
		array_push($this->customLabels, $scriptLabel);
		return $this;
	}

	/**
	 * Append a generic Script Text for the next Rendering
	 *
	 * @param string $name Label Name
	 * @param string $text Script Text
	 * @return \FML\Script\Script
	 */
	public function appendGenericScriptLabel($name, $text = null) {
		if (is_object($name) && ($name instanceof ScriptLabel)) {
			$scriptLabel = $name;
		}
		else {
			$scriptLabel = new ScriptLabel($name, $text);
		}
		array_push($this->genericLabels, $scriptLabel);
		return $this;
	}

	/**
	 * Remove all generic Script Texts
	 *
	 * @return \FML\Script\Script
	 */
	public function resetGenericScriptLabels() {
		$this->genericLabels = array();
		return $this;
	}

	/**
	 * Build the complete Script Text
	 *
	 * @return string
	 */
	public function buildScriptText() {
		$scriptText = PHP_EOL;
		$scriptText .= $this->getHeaderComment();
		$scriptText .= $this->getIncludes();
		$scriptText .= $this->getConstants();
		$scriptText .= $this->getFunctions();
		$scriptText .= $this->getLabels();
		$scriptText .= $this->getMainFunction();
		return $scriptText;
	}

	/**
	 * Create the Script XML Tag
	 *
	 * @param \DOMDocument $domDocument DOMDocument for which the XML Element should be created
	 * @return \DOMElement
	 */
	public function render(\DOMDocument $domDocument) {
		$scriptXml = $domDocument->createElement($this->tagName);
		$scriptText = $this->buildScriptText();
		$scriptComment = $domDocument->createComment($scriptText);
		$scriptXml->appendChild($scriptComment);
		$this->removeGenericScriptLabels();
		return $scriptXml;
	}

	/**
	 * Get the Header Comment
	 *
	 * @return string
	 */
	protected function getHeaderComment() {
		$headerComment = '
/*********************************
*	FancyManiaLinks by steeffeen	 *
*	http://github.com/steeffeen/FancyManiaLinks	 *
*********************************/';
		return $headerComment;
	}

	/**
	 * Get the Includes
	 *
	 * @return string
	 */
	protected function getIncludes() {
		$includesText = implode('', $this->includes);
		return $includesText;
	}

	/**
	 * Get the Constants
	 *
	 * @return string
	 */
	protected function getConstants() {
		$constantsText = implode('', $this->constants);
		return $constantsText;
	}

	/**
	 * Get the Functions
	 *
	 * @return string
	 */
	protected function getFunctions() {
		$functionsText = implode('', $this->functions);
		return $functionsText;
	}

	/**
	 * Get the Labels
	 *
	 * @return string
	 */
	protected function getLabels() {
		$customLabelsText = implode('', $this->customLabels);
		$genericLabelsText = implode('', $this->genericLabels);
		return $customLabelsText . $genericLabelsText;
	}

	/**
	 * Get the Main Function
	 *
	 * @return string
	 */
	protected function getMainFunction() {
		$mainFunction = '
Void Dummy() {}
main() {
	declare FML_ScriptStart = Now;
	+++' . ScriptLabel::ONINIT . '+++
	declare FML_LoopCounter = 0;
	declare FML_LastTick = 0;
	while (True) {
		yield;
		foreach (Event in PendingEvents) {
			switch (Event.Type) {
				case CMlEvent::Type::EntrySubmit: {
					+++' . ScriptLabel::ENTRYSUBMIT . '+++
				}
				case CMlEvent::Type::KeyPress: {
					+++' . ScriptLabel::KEYPRESS . '+++
				}
				case CMlEvent::Type::MouseClick: {
					+++' . ScriptLabel::MOUSECLICK . '+++
				}
				case CMlEvent::Type::MouseOut: {
					+++' . ScriptLabel::MOUSEOUT . '+++
				}
				case CMlEvent::Type::MouseOver: {
					+++' . ScriptLabel::MOUSEOVER . '+++
				}
			}
		}
		+++' . ScriptLabel::LOOP . '+++
		FML_LoopCounter += 1;
		if (FML_LastTick + 250 > Now) continue;
		+++' . ScriptLabel::TICK . '+++ 
		FML_LastTick = Now;
	}
}';
		return $mainFunction;
	}
}
