<?php

namespace FML\Script;

use FML\Controls\Control;
use FML\Types\Scriptable;

/**
 * Class representing the ManiaLink Script
 *
 * @author steeffeen
 */
class Script {
	/**
	 * Constants
	 */
	const CLASS_TOOLTIPS = "FML_Tooltips";
	
	/**
	 * Protected Properties
	 */
	protected $tagName = 'script';
	protected $tooltips = false;

	/**
	 * Add a Tooltip Behavior
	 *
	 * @param Control $hoverControl        	
	 * @param Control $tooltipControl        	
	 * @return \FML\Script\Script
	 */
	public function addTooltip(Control $hoverControl, Control $tooltipControl) {
		if (!($hoverControl instanceof Scriptable)) {
			trigger_error('Scriptable Control needed as HoverControl for Tooltips!');
			return $this;
		}
		$tooltipControl->assignId();
		$tooltipControl->setVisible(false);
		$hoverControl->setScriptEvents(true);
		$hoverControl->addClass(self::CLASS_TOOLTIPS);
		$hoverControl->addClass($tooltipControl->getId());
		$this->tooltips = true;
		return $this;
	}

	/**
	 * Create the Script XML Tag
	 *
	 * @param \DOMDocument $domDocument        	
	 * @return \DOMElement
	 */
	public function render(\DOMDocument $domDocument) {
		$scriptXml = $domDocument->createElement($this->tagName);
		$scriptText = $this->buildScriptText();
		$scriptComment = $domDocument->createComment($scriptText);
		$scriptXml->appendChild($scriptComment);
		return $scriptXml;
	}

	/**
	 * Build the complete Script Text
	 *
	 * @return string
	 */
	private function buildScriptText() {
		$scriptText = "";
		$scriptText .= $this->getHeaderComment();
		if ($this->tooltips) {
			$scriptText .= $this->getTooltipLabels();
		}
		$scriptText .= $this->getMainFunction();
		return $scriptText;
	}

	/**
	 * Get the Header Comment
	 *
	 * @return string
	 */
	private function getHeaderComment() {
		$headerComment = file_get_contents(__DIR__ . '/Parts/Header.txt');
		return $headerComment;
	}

	/**
	 * Get the Tooltips Labels
	 *
	 * @return string
	 */
	private function getTooltipLabels() {
		$tooltipsLabels = PHP_EOL;
		$mouseOverScript = "
if (Event.Control.ControlClasses.exists(\"" . self::CLASS_TOOLTIPS . "\")) {
	foreach (ControlId in Event.Control.ControlClasses) {
		declare TooltipControl <=> Page.GetFirstChild(ControlId);
		if (TooltipControl == Null) continue;
		TooltipControl.Show();
	}
}";
		$tooltipsLabels .= Builder::getLabelImplementationBlock("MouseOver", $mouseOverScript);
		$mouseOutScript = "
if (Event.Control.ControlClasses.exists(\"" . self::CLASS_TOOLTIPS . "\")) {
	foreach (ControlId in Event.Control.ControlClasses) {
		declare TooltipControl <=> Page.GetFirstChild(ControlId);
		if (TooltipControl == Null) continue;
		TooltipControl.Hide();
	}
}";
		$tooltipsLabels .= Builder::getLabelImplementationBlock("MouseOut", $mouseOutScript);
		return $tooltipsLabels;
	}

	/**
	 * Get the Main Function
	 *
	 * @return string
	 */
	private function getMainFunction() {
		$mainFunction = file_get_contents(__DIR__ . '/Parts/Main.txt');
		return $mainFunction;
	}
}
