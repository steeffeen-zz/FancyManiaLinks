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
	 * Protected Properties
	 */
	protected $tagName = 'script';
	protected $tooltips = array();

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
		$hoverControl->assignId();
		$hoverControl->setScriptEvents(true);
		$tooltipControl->assignId();
		$tooltipControl->setVisible(false);
		$hoverId = $hoverControl->getId();
		$tooltipId = $tooltipControl->getId();
		if (!isset($this->tooltips[$hoverId])) {
			$this->tooltips[$hoverId] = array();
		}
		$this->tooltips[$hoverId][$tooltipId] = array();
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
		$scriptText .= $this->getTooltips();
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
	private function getTooltips() {
		$tooltipsLabels = PHP_EOL;
		foreach ($this->tooltips as $hoverId => $tooltips) {
			foreach ($tooltips as $tooltipId => $tooltipOptions) {
				$mouseOverScript = "
if (Event.ControlId == \"{$hoverId}\") {
	declare TooltipControl <=> Page.GetFirstChild(\"{$tooltipId}\");
	if (TooltipControl != Null) TooltipControl.Show();
}";
				$tooltipsLabels .= Builder::getLabelImplementationBlock("MouseOver", $mouseOverScript);
				$mouseOutScript = "
if (Event.ControlId == \"{$hoverId}\") {
	declare TooltipControl <=> Page.GetFirstChild(\"{$tooltipId}\");
	if (TooltipControl != Null) TooltipControl.Hide();
}";
				$tooltipsLabels .= Builder::getLabelImplementationBlock("MouseOut", $mouseOutScript);
			}
		}
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
