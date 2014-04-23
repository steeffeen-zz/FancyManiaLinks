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
 * Script Feature realising a Mechanism for browsing through Pages
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Paging extends ScriptFeature {
	/*
	 * Constants
	 */
	const VAR_CURRENT_PAGE = 'FML_Paging_CurrentPage';
	const FUNCTION_UPDATE_CURRENT_PAGE = 'FML_UpdateCurrentPage';
	
	/*
	 * Protected Properties
	 */
	protected $pages = array();
	protected $buttons = array();
	protected $label = null;

	/**
	 * Construct a new Paging Script Feature
	 *
	 * @param Label $label (optional) Page Number Label
	 */
	public function __construct(Label $label = null) {
		if ($label) {
			$this->setLabel($label);
		}
	}

	/**
	 * Add a new Page Control
	 *
	 * @param Control $pageControl Page Control
	 * @param string $pageNumber (optional) Page Number
	 * @return \FML\Script\Features\Paging
	 */
	public function addPage(Control $pageControl, $pageNumber = null) {
		if ($pageNumber === null) {
			$pageNumber = count($this->pages) + 1;
		}
		$page = new PagingPage($pageControl, $pageNumber);
		$this->appendPage($page);
		return $this;
	}

	/**
	 * Append a Page
	 *
	 * @param PagingPage $page Paging Page
	 * @return \FML\Script\Features\Paging
	 */
	public function appendPage(PagingPage $page) {
		array_push($this->pages, $page);
		return $this;
	}

	/**
	 * Add a new Button to browse through the Pages
	 *
	 * @param Control $buttonControl Button used for Browsing
	 * @param int $browseAction (optional) Number of browsed Pages per Click
	 * @return \FML\Script\Features\Paging
	 */
	public function addButton(Control $buttonControl, $browseAction = null) {
		if ($browseAction === null) {
			$buttonCount = count($this->buttons);
			if ($buttonCount % 2 === 0) {
				$browseAction = $buttonCount / 2 + 1;
			}
			else {
				$browseAction = $buttonCount / -2 - 1;
			}
			var_dump($browseAction);
		}
		$button = new PagingButton($buttonControl, $browseAction);
		$this->appendButton($button);
		return $this;
	}

	/**
	 * Append a Button to browse through Pages
	 *
	 * @param PagingButton $button Paging Button
	 * @return \FML\Script\Features\Paging
	 */
	public function appendButton(PagingButton $button) {
		array_push($this->buttons, $button);
		return $this;
	}

	/**
	 * Set the Label showing the Page Number
	 *
	 * @param Label $label Page Number Label
	 * @return \FML\Script\Features\Paging
	 */
	public function setLabel(Label $label) {
		$label->checkId();
		$this->label = $label;
		return $this;
	}

	/**
	 *
	 * @see \FML\Script\Features\ScriptFeature::prepare()
	 */
	public function prepare(Script $script) {
		$script->setScriptInclude(ScriptInclude::TEXTLIB);
		
		$currentPageVariable = self::VAR_CURRENT_PAGE;
		$updatePageFunction = self::FUNCTION_UPDATE_CURRENT_PAGE;
		
		$minPage = $this->getMinPage();
		$minPageNumber = $minPage->getPageNumber();
		$maxPage = $this->getMaxPage();
		$maxPageNumber = $maxPage->getPageNumber();
		
		$pagingId = $minPage->getControl()->getId(true);
		$pageLabelId = $this->label->getId(true);
		$pagesArrayText = $this->getPagesArrayText();
		
		// Init
		$initScriptText = "
declare {$currentPageVariable} for This = Integer[Text];
{$currentPageVariable}[\"{$pagingId}\"] = {$minPageNumber};
{$updatePageFunction}(\"{$pagingId}\", \"{$pageLabelId}\", 0, {$maxPageNumber}, {$pagesArrayText});";
		$script->appendGenericScriptLabel(ScriptLabel::ONINIT, $initScriptText, true);
		
		// MouseClick
		$clickScriptText = "
declare Pages = {$pagesArrayText};
if (Pages.exists(Event.Control.ControlId)) {
	declare BrowseAction = Pages.keyof(Event.Control.ControlId);
	{$updatePageFunction}(\"{$pagingId}\", \"{$pageLabelId}\", BrowseAction, {$maxPageNumber}, Pages);
}";
		$script->appendGenericScriptLabel(ScriptLabel::MOUSECLICK, $clickScriptText, true);
		
		// Update function
		$functionText = "
Void {$updatePageFunction}(Text _PagingId, Text _PageLabelId, Integer _BrowseAction, Integer _MaxPageNumber, Integer[Text] _Pages) {
	declare {$currentPageVariable} for This = Integer[Text];
	if (!{$currentPageVariable}.existskey(_PagingId)) return;
	{$currentPageVariable}[_PagingId] += _BrowseAction;
	foreach (PageNumber => PageId in _Pages) {
		declare PageControl <=> Page.GetFirstChild(PageId);
		PageControl.Visible = ({$currentPageVariable}[_PagingId] == PageNumber);
	}
	declare PageLabel <=> (Page.GetFirstChild(_PageLabelId) as CMlLabel);
	if (PageLabel == Null) return;
	PageLabel.Value = {$currentPageVariable}[_PagingId]^\"/\"^_MaxPageNumber;
}";
		$script->addScriptFunction($updatePageFunction, $functionText);
		return $this;
	}

	/**
	 * Get the minimum Page
	 *
	 * @return \FML\Script\Features\PagingPage
	 */
	protected function getMinPage() {
		$minPageNumber = null;
		$minPage = null;
		foreach ($this->pages as $page) {
			$pageNumber = $page->getPageNumber();
			if ($minPageNumber === null || $pageNumber < $minPageNumber) {
				$minPageNumber = $pageNumber;
				$minPage = $page;
			}
		}
		return $minPage;
	}

	/**
	 * Get the maximum Page
	 *
	 * @return \FML\Script\Features\PagingPage
	 */
	protected function getMaxPage() {
		$maxPageNumber = null;
		$maxPage = null;
		foreach ($this->pages as $page) {
			$pageNumber = $page->getPageNumber();
			if ($maxPageNumber === null || $pageNumber > $maxPageNumber) {
				$maxPageNumber = $pageNumber;
				$maxPage = $page;
			}
		}
		return $maxPage;
	}

	/**
	 * Build the Array Text for the Pages
	 *
	 * @return string
	 */
	protected function getPagesArrayText() {
		$pages = array();
		foreach ($this->pages as $page) {
			$pages[$page->getPageNumber()] = $page->getControl()->getId();
		}
		return Builder::getArray($pages, true);
	}
}
