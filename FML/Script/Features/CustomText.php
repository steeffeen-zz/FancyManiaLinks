<?php

namespace FML\Script\Features;

use FML\Controls\Control;
use FML\Script\Script;
use FML\Script\ScriptLabel;


/**
 * Script Feature for a Custom Script Text
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class CustomText extends ScriptFeature {
	/*
	 * Protected Properties
	 */
	protected $control = null;
	protected $labelName = null;
	protected $text = null;

	/**
	 * Construct a new Custom Script Text
	 *
	 * @param Control $control   Event Control
	 * @param string  $text      Script Text
	 * @param string  $labelName (optional) Script Label Name
	 */
	public function __construct(Control $control, $text, $labelName = ScriptLabel::MOUSECLICK) {
		$this->setControl($control);
		$this->setText($text);
		$this->setLabelName($labelName);
	}

	/**
	 * Set the Control
	 *
	 * @param Control $control Custom Control
	 * @return \FML\Script\Features\CustomText
	 */
	public function setControl(Control $control) {
		$control->checkId();
		$control->setScriptEvents(true);
		$this->control = $control;
		return $this;
	}

	/**
	 * Set the Script Text
	 *
	 * @param string $text Script Text
	 * @return \FML\Script\Features\CustomText
	 */
	public function setText($text) {
		$this->text = (string)$text;
		return $this;
	}

	/**
	 * Set the Label Name
	 *
	 * @param string $labelName Script Label Name
	 * @return \FML\Script\Features\CustomText
	 */
	public function setLabelName($labelName) {
		$this->labelName = $labelName;
		return $this;
	}

	/**
	 * @see \FML\Script\Features\ScriptFeature::prepare()
	 */
	public function prepare(Script $script) {
		$script->appendGenericScriptLabel($this->labelName, $this->text);
		return $this;
	}
}
