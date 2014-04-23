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
 * A Page Control
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class PagingPage {
	/*
	 * Protected Properties
	 */
	protected $control = null;
	protected $number = null;

	/**
	 * Construct a new Paging Page
	 *
	 * @param Control $control (optional) Page Control
	 * @param int $pageNumber (optional) Number of the Page
	 */
	public function __construct(Control $page = null, $pageNumber = 1) {
		$this->setControl($page);
		$this->setPageNumber($pageNumber);
	}

	/**
	 * Set the Page Control
	 *
	 * @param Control $page Page Control
	 * @return \FML\Script\Features\PagingPage
	 */
	public function setControl(Control $page) {
		$page->checkId();
		$this->control = $page;
		return $this;
	}

	/**
	 * Get the Page Control
	 *
	 * @return \FML\Controls\Control
	 */
	public function getControl() {
		return $this->control;
	}

	/**
	 * Set the Page Number
	 *
	 * @param int $pageNumber Number of the Page
	 * @return \FML\Script\Features\PagingPage
	 */
	public function setPageNumber($pageNumber) {
		$this->number = (int) $pageNumber;
		return $this;
	}

	/**
	 * Get the Page Number
	 *
	 * @return int
	 */
	public function getPageNumber() {
		return $this->number;
	}
}
