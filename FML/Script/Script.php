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
	const CLASS_MENU = "FML_Menu";
	const CLASS_MENUBUTTON = "FML_MenuButton";
	const CLASS_PAGE = "FML_Page";
	const CLASS_PAGER = "FML_Pager";
	const CLASS_PROFILE = "FML_Profile";
	const CLASS_MAPINFO = "FML_MapInfo";
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
	protected $pages = false;
	protected $profile = false;
	protected $mapInfo = false;

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
		$menuControl->addClass(self::CLASS_MENU);
		$menuControl->addClass($menuId);
		$clickControl->setScriptEvents(true);
		$clickControl->addClass(self::CLASS_MENUBUTTON);
		$clickControl->addClass("{$menuId}-{$menuControl->getId()}");
		$this->addInclude('TextLib', 'TextLib');
		$this->menus = true;
		return $this;
	}

	/**
	 * Add a Page for a Paging Behavior
	 *
	 * @param Control $pageControl
	 * @param int $pageNumber
	 * @param string $pagesId
	 * @return \FML\Script\Script
	 */
	public function addPage(Control $pageControl, $pageNumber, $pagesId = null) {
		$pageNumber = (int) $pageNumber;
		if (!$pagesId) {
			$pagesId = '_';
		}
		$pageControl->addClass(self::CLASS_PAGE);
		$pageControl->addClass(self::CLASS_PAGE . '-' . $pagesId);
		$pageControl->addClass(self::CLASS_PAGE . '-P-' . $pageNumber);
		return $this;
	}

	/**
	 * Add a Pager Button for a Paging Behavior
	 *
	 * @param Control $pagerControl
	 * @param int $pagingAction
	 * @param string $pagesId
	 * @return \FML\Script\Script
	 */
	public function addPager(Control $pagerControl, $pagingAction, $pagesId = null) {
		if (!($pagerControl instanceof Scriptable)) {
			trigger_error('Scriptable Control needed as PagerControl for Pages!');
			return $this;
		}
		$pagingAction = (int) $pagingAction;
		if (!$pagesId) {
			$pagesId = '_';
		}
		$pagerControl->setScriptEvents(true);
		$pagerControl->addClass(self::CLASS_PAGER);
		$pagerControl->addClass(self::CLASS_PAGER . '-' . $pagesId);
		$pagerControl->addClass(self::CLASS_PAGER . '-A-' . $pagingAction);
		$this->addInclude('TextLib', 'TextLib');
		$this->pages = true;
		return $this;
	}

	/**
	 * Add a Button Behavior that will open the Built-In Player Profile
	 *
	 * @param Control $profileControl
	 * @param string $playerLogin
	 * @return \FML\Script\Script
	 */
	public function addProfileButton(Control $profileControl, $playerLogin) {
		if (!($profileControl instanceof Scriptable)) {
			trigger_error('Scriptable Control needed as ClickControl for Profiles!');
			return $this;
		}
		$profileControl->setScriptEvents(true);
		$profileControl->addClass(self::CLASS_PROFILE);
		if ($playerLogin) {
			$profilControl->addClass(self::CLASS_PROFILE . '-' . $playerLogin);
		}
		$this->profile = true;
		return $this;
	}

	/**
	 * Add a Button Behavior that will open the Built-In Map Info
	 *
	 * @param Control $mapInfoControl
	 * @return \FML\Script\Script
	 */
	public function addMapInfoButton(Control $mapInfoControl) {
		if (!($mapInfoControl instanceof Scriptable)) {
			trigger_error('Scriptable Control needed as ClickControl for Map Info!');
			return $this;
		}
		$mapInfoControl->setScriptEvents(true);
		$mapInfoControl->addClass(self::CLASS_MAPINFO);
		$this->mapInfo = true;
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
		if ($this->pages) {
			$scriptText .= $this->getPagesLabels();
		}
		if ($this->profile) {
			$scriptText .= $this->getProfileLabels();
		}
		if ($this->mapInfo) {
			$scriptText .= $this->getMapInfoLabels();
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
		$includesText = PHP_EOL;
		foreach ($this->includes as $namespace => $file) {
			$includesText .= "#Include \"{$file}\" as {$namespace}" . PHP_EOL;
		}
		return $includesText;
	}

	/**
	 * Get the Tooltip Labels
	 *
	 * @return string
	 */
	private function getTooltipLabels() {
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
		$tooltipsLabels = Builder::getLabelImplementationBlock(self::LABEL_MOUSEOVER, $mouseOverScript);
		$tooltipsLabels .= Builder::getLabelImplementationBlock(self::LABEL_MOUSEOUT, $mouseOutScript);
		return $tooltipsLabels;
	}

	/**
	 * Get the Menu Labels
	 *
	 * @return string
	 */
	private function getMenuLabels() {
		$mouseClickScript = "
if (Event.Control.HasClass(\"" . self::CLASS_MENUBUTTON . "\")) {
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
		if (!MenuControl.HasClass(\"" . self::CLASS_MENU . "\")) continue;
		MenuControl.Hide();
	}
	declare MenuControl <=> Page.GetFirstChild(MenuControlId);
	if (MenuControl != Null) MenuControl.Show();
}";
		$menuLabels = Builder::getLabelImplementationBlock(self::LABEL_MOUSECLICK, $mouseClickScript);
		return $menuLabels;
	}

	/**
	 * Get the Pages Labels
	 *
	 * @return string
	 */
	private function getPagesLabels() {
		$pagesScript = "";
		$pagesLabels = Builder::getLabelImplementationBlock(self::LABEL_MOUSECLICK, $pagesScript);
		return $pagesLabels;
	}

	/**
	 * Get the Profile Labels
	 *
	 * @return string
	 */
	private function getProfileLabels() {
		$profileScript = "
if (Event.Control.HasClass(\"" . self::CLASS_PROFILE . "\") {
	declare Login = LocalUser.Login;
	foreach (ControlClass in Event.Control.ControlClasses) {
		declare ClassParts = TextLib::Split(\"-\", ControlClass);
		if (ClassParts.count <= 1) continue;
		if (ClassParts[0] != \"" . self::CLASS_PROFILE . "\") continue;
		Login = ClassParts[1];
		break;
	}
	ShowProfile(Login);
}";
		$profileLabels = Builder::getLabelImplementationBlock(self::LABEL_MOUSECLICK, $profileScript);
		return $profileLabels;
	}

	/**
	 * Get the Map Info Labels
	 *
	 * @return string
	 */
	private function getMapInfoLabels() {
		$mapInfoScript = "
if (Event.Control.HasClass(\"" . self::CLASS_MAPINFO . "\") {
	ShowCurChallengeCard();
}";
		$mapInfoLabels = Builder::getLabelImplementationBlock(self::LABEL_MOUSECLICK, $mapInfoScript);
		return $mapInfoLabels;
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
