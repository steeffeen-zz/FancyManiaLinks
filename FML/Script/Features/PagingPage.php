<?php

namespace FML\Script\Features;

use FML\Controls\Control;

/**
 * Paging Page
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class PagingPage {

	/*
	 * Protected properties
	 */
	/** @var Control $control */
	protected $control = null;
	protected $number = null;

	/**
	 * Construct a new Paging Page
	 *
	 * @api
	 * @param Control $control    (optional) Page Control
	 * @param int     $pageNumber (optional) Number of the Page
	 */
	public function __construct(Control $control = null, $pageNumber = 1) {
		if ($control !== null) {
			$this->setControl($control);
		}
		$this->setPageNumber($pageNumber);
	}

	/**
	 * Get the Page Control
	 *
	 * @api
	 * @return Control
	 */
	public function getControl() {
		return $this->control;
	}

	/**
	 * Set the Page Control
	 *
	 * @api
	 * @param Control $control Page Control
	 * @return static
	 */
	public function setControl(Control $control) {
		$this->control = $control->checkId();
		return $this;
	}

	/**
	 * Get the Page number
	 *
	 * @api
	 * @return int
	 */
	public function getPageNumber() {
		return $this->number;
	}

	/**
	 * Set the Page number
	 *
	 * @api
	 * @param int $pageNumber Number of the Page
	 * @return static
	 */
	public function setPageNumber($pageNumber) {
		$this->number = (int)$pageNumber;
		return $this;
	}
	
}
