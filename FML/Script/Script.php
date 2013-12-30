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
	const CLASS_MENUS = "FML_Menus";
	const CLASS_MENUCHILD = "FML_MenuChild";
	const CLASS_TOOLTIPS = "FML_Tooltips";
	const LABEL_ONINIT = "OnInit";
	const LABEL_LOOP = "Loop";
	const LABEL_ENTRYSUBMIT = "EntrySubmit";
	const LABEL_KEYPRESS = "KeyPress";
	const LABEL_MOUSECLICK = "MouseClick";
	const LABEL_MOUSEOUT = "MouseOut";
	const LABEL_MOUSEOVER = "MouseOver";
	
	/**
	 * Protected Properties
	 */
	protected $tagName = 'script';
	protected $includes = array();
	protected $tooltips = false;
	protected $menus = false;

	/**
	 * Add an Include to the Script
	 *
	 * @param string $namespace
	 * @param string $file
	 * @return \FML\Script\Script
	 */
	public function addInclude($namespace, $file) {
		$this->includes[$namespace] = $file;
		return $this;
	}

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
		$tooltipControl->checkId();
		$tooltipControl->setVisible(false);
		$hoverControl->setScriptEvents(true);
		$hoverControl->addClass(self::CLASS_TOOLTIPS);
		$hoverControl->addClass($tooltipControl->getId());
		$this->tooltips = true;
		return $this;
	}

	/**
	 * Add a Menu Behavior
	 *
	 * @param Control $clickControl
	 * @param Control $menuControl
	 * @param string $menuId
	 * @return \FML\Script\Script
	 */
	public function addMenu(Control $clickControl, Control $menuControl, $menuId = null) {
		if (!($clickControl instanceof Scriptable)) {
			trigger_error('Scriptable Control needed as ClickControl for Menus!');
			return $this;
		}
		if (!$menuId) {
			$menuId = '_';
		}
		$menuControl->checkId();
		$menuControl->addClass(self::CLASS_MENUCHILD);
		$menuControl->addClass($menuId);
		$clickControl->setScriptEvents(true);
		$clickControl->addClass(self::CLASS_MENUS);
		$clickControl->addClass("{$menuId}-{$menuControl->getId()}");
		$this->addInclude('TextLib', 'TextLib');
		$this->menus = true;
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
		$scriptText .= $this->getIncludes();
		if ($this->tooltips) {
			$scriptText .= $this->getTooltipLabels();
		}
		if ($this->menus) {
			$scriptText .= $this->getMenuLabels();
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
	 * Get the Includes
	 *
	 * @return string
	 */
	private function getIncludes() {
		$includesScript = PHP_EOL;
		foreach ($this->includes as $namespace => $file) {
			$includesScript .= "#Include \"{$file}\" as {$namespace}" . PHP_EOL;
		}
		return $includesScript;
	}

	/**
	 * Get the Tooltip Labels
	 *
	 * @return string
	 */
	private function getTooltipLabels() {
		$tooltipsLabels = PHP_EOL;
		$mouseOverScript = "
if (Event.Control.HasClass(\"" . self::CLASS_TOOLTIPS . "\")) {
	foreach (ControlClass in Event.Control.ControlClasses) {
		declare TooltipControl <=> Page.GetFirstChild(ControlClass);
		if (TooltipControl == Null) continue;
		TooltipControl.Show();
	}
}";
		$mouseOutScript = "
if (Event.Control.HasClass(\"" . self::CLASS_TOOLTIPS . "\")) {
	foreach (ControlClass in Event.Control.ControlClasses) {
		declare TooltipControl <=> Page.GetFirstChild(ControlClass);
		if (TooltipControl == Null) continue;
		TooltipControl.Hide();
	}
}";
		$tooltipsLabels .= Builder::getLabelImplementationBlock(self::LABEL_MOUSEOVER, $mouseOverScript);
		$tooltipsLabels .= Builder::getLabelImplementationBlock(self::LABEL_MOUSEOUT, $mouseOutScript);
		return $tooltipsLabels;
	}

	/**
	 * Get the Menu Labels
	 *
	 * @return string
	 */
	private function getMenuLabels() {
		$menuLabels = PHP_EOL;
		$mouseClickScript = "
if (Event.Control.HasClass(\"" . self::CLASS_MENUS . "\")) {
		log(Now);
		log(Event.Control.ControlClasses);
	declare Text MenuIdClass;
	declare Text MenuControlId;
	foreach (ControlClass in Event.Control.ControlClasses) {
		declare ClassParts = TextLib::Split(\"-\", ControlClass);
		if (ClassParts.count <= 1) continue;
		MenuIdClass = ClassParts[0];
		MenuControlId = ClassParts[1];
		break;
	}
	Page.GetClassChildren(MenuIdClass, Page.MainFrame, True);
	foreach (MenuControl in Page.GetClassChildren_Result) {
		if (!MenuControl.HasClass(\"" . self::CLASS_MENUCHILD . "\")) continue;
		MenuControl.Hide();
	}
	declare MenuControl <=> Page.GetFirstChild(MenuControlId);
	if (MenuControl != Null) MenuControl.Show();
}";
		$menuLabels .= Builder::getLabelImplementationBlock(self::LABEL_MOUSECLICK, $mouseClickScript);
		return $menuLabels;
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
