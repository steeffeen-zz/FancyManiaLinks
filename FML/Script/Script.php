<?php

namespace FML\Script;

use FML\Controls\Control;
use FML\Script\Constructs\Constants;
use FML\Script\Constructs\Functions;
use FML\Script\Constructs\Globals;
use FML\Script\Constructs\Includes;
use FML\Script\Constructs\Labels;
use FML\Types\Scriptable;

/**
 * Class representing the Manialink Script
 *
 * @author steeffeen
 */
class Script {
	/**
	 * Protected properties
	 */
	protected $tagName = 'script';
	protected $tooltips = array();
	protected $features = array();

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
	 * Remove all Tooltips
	 *
	 * @return \FML\Script\Script
	 */
	public function removeTooltips() {
		$this->tooltips = array();
		return $this;
	}

	/**
	 * Add a script feature
	 *
	 * @param ScriptFeature $scriptFeature        	
	 * @return \FML\Script\Script
	 */
	public function addFeature(ScriptFeature $scriptFeature) {
		array_push($this->features, $scriptFeature);
		return $this;
	}

	/**
	 * Remove all script features
	 *
	 * @return \FML\Script\Script
	 */
	public function removeFeatures() {
		$this->features = array();
		return $this;
	}

	/**
	 * Create the script xml tag
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
	 * Build the complete script text based on all script items
	 *
	 * @return string
	 */
	private function buildScriptText() {
		$scriptText = "";
		$scriptText .= $this->getHeaderPart();
		$scriptText .= $this->getIncludesPart();
		$scriptText .= $this->getConstantsPart();
		$scriptText .= $this->getGlobalsPart();
		$scriptText .= $this->getLabelsPart();
		$scriptText .= $this->getFunctionsPart();
		$scriptText .= $this->getMainPart();
		return $scriptText;
	}

	/**
	 * Get the Header Comment
	 *
	 * @return string
	 */
	private function getHeaderPart() {
		$headerPart = file_get_contents(__DIR__ . '/Parts/Header.txt');
		return $headerPart;
	}

	/**
	 * Get Includes of the Script
	 *
	 * @return string
	 */
	private function getIncludesPart() {
		$includes = array();
		foreach ($this->features as $feature) {
			if (!($feature instanceof Includes)) {
				continue;
			}
			$featureIncludes = $feature->getIncludes();
			foreach ($featureIncludes as $namespace => $fileName) {
				$includes[$namespace] = $fileName;
			}
		}
		$includesPart = PHP_EOL;
		foreach ($includes as $namespace => $fileName) {
			$includesPart .= "#Include \"{$fileName}\" as {$namespace}" . PHP_EOL;
		}
		return $includesPart;
	}

	/**
	 * Get declared Constants of the Script
	 *
	 * @return string
	 */
	private function getConstantsPart() {
		$constants = array();
		foreach ($this->features as $feature) {
			if (!($feature instanceof Constants)) {
				continue;
			}
			$featureConstants = $feature->getConstants();
			foreach ($featureConstants as $name => $value) {
				$constants[$name] = $value;
			}
		}
		$constantsPart = PHP_EOL;
		foreach ($constants as $name => $value) {
			$constantsPart .= "#Const {$name} {$value}" . PHP_EOL;
		}
		return $constantsPart;
	}

	/**
	 * Get declared Global Variables of the Script
	 *
	 * @return string
	 */
	private function getGlobalsPart() {
		$globals = array();
		foreach ($this->features as $feature) {
			if (!($feature instanceof Globals)) {
				continue;
			}
			$featureGlobals = $feature->getGlobals();
			foreach ($featureGlobals as $name => $type) {
				$globals[$name] = $type;
			}
		}
		$globalsPart = PHP_EOL;
		foreach ($globals as $name => $type) {
			$globalsPart .= "declare {$type} {$name};" . PHP_EOL;
		}
		return $globalsPart;
	}

	/**
	 * Get implemented Labels of the Script
	 *
	 * @return string
	 */
	private function getLabelsPart() {
		$labels = array();
		foreach ($this->features as $feature) {
			if (!($feature instanceof Labels)) {
				continue;
			}
			$featureLabels = $feature->getLabels();
			foreach ($featureLabels as $name => $implementation) {
				$label = array($name, $implementation);
				array_push($labels, $label);
			}
		}
		$labelsPart = PHP_EOL;
		foreach ($labels as $label) {
			$labelsPart .= '***' . $label[0] . '***' . PHP_EOL . '***' . PHP_EOL . $label[1] . PHP_EOL . '***' . PHP_EOL;
		}
		return $labelsPart;
	}

	/**
	 * Get declared Functions of the Script
	 *
	 * @return string
	 */
	private function getFunctionsPart() {
		$functions = array();
		foreach ($this->features as $feature) {
			if (!($feature instanceof Functions)) {
				continue;
			}
			$featureFunctions = $feature->getFunctions();
			foreach ($featureFunctions as $signature => $implementation) {
				$functions[$signature] = $implementation;
			}
		}
		$functionsPart = PHP_EOL;
		foreach ($functions as $signature => $implementation) {
			$functionsPart .= $signature . '{' . PHP_EOL . $implementation . PHP_EOL . '}' . PHP_EOL;
		}
		return $functionsPart;
	}

	/**
	 * Get the Main Function
	 *
	 * @return string
	 */
	private function getMainPart() {
		$mainPart = file_get_contents(__DIR__ . '/Parts/Main.txt');
		return $mainPart;
	}
}
