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
 * A Button for browsing through Pages
 *
 * @author steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class PagingButton {
	/*
	 * Protected Properties
	 */
	protected $button = null;
	protected $browseAction = null;

	/**
	 * Construct a new Paging Button
	 *
	 * @param Control $button (optional) Browse Button
	 * @param int $browseAction (optional) Number of browsed Pages per Click
	 */
	public function __construct(Control $button = null, $browseAction = null) {
		$this->setButton($button);
		$this->setBrowseAction($browseAction);
	}

	/**
	 * Set the Button Control
	 *
	 * @param Control $button Browse Button
	 * @return \FML\Script\Features\PagingButton
	 */
	public function setButton(Control $button) {
		$button->checkId();
		$this->button = $button;
		return $this;
	}

	/**
	 * Get the Button Control
	 *
	 * @return \FML\Controls\Control
	 */
	public function getButton() {
		return $this->button;
	}

	/**
	 * Set the Browse Action
	 *
	 * @param int $browseAction Number of browsed Pages per Click
	 * @return \FML\Script\Features\PagingButton
	 */
	public function setBrowseAction($browseAction) {
		$this->browseAction = (int) $browseAction;
		return $this;
	}

	/**
	 * Get the Browse Action
	 *
	 * @return int
	 */
	public function getBrowseAction() {
		return $this->browseAction;
	}
}
