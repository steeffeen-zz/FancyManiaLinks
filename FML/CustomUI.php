<?php

namespace FML;

/**
 * Class representing a Custom_UI
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class CustomUI {

	/*
	 * Protected properties
	 */
	protected $encoding = 'utf-8';
	protected $tagName = 'custom_ui';
	protected $noticeVisible = null;
	protected $challengeInfoVisible = null;
	protected $netInfosVisible = null;
	protected $chatVisible = null;
	protected $checkpointListVisible = null;
	protected $roundScoresVisible = null;
	protected $scoretableVisible = null;
	protected $globalVisible = null;

	/**
	 * Create a new CustomUI
	 *
	 * @api
	 * @return static
	 */
	public static function create() {
		return new static();
	}

	/**
	 * Set the XML encoding
	 *
	 * @api
	 * @param string $encoding XML encoding
	 * @return static
	 */
	public function setXMLEncoding($encoding) {
		$this->encoding = (string)$encoding;
		return $this;
	}

	/**
	 * Set showing of notices
	 *
	 * @api
	 * @param bool $visible If notices should be shown
	 * @return static
	 */
	public function setNoticeVisible($visible) {
		$this->noticeVisible = $visible;
		return $this;
	}

	/**
	 * Set showing of the challenge info
	 *
	 * @api
	 * @param bool $visible If the challenge info should be shown
	 * @return static
	 */
	public function setChallengeInfoVisible($visible) {
		$this->challengeInfoVisible = $visible;
		return $this;
	}

	/**
	 * Set showing of the net infos
	 *
	 * @api
	 * @param bool $visible If the net infos should be shown
	 * @return static
	 */
	public function setNetInfosVisible($visible) {
		$this->netInfosVisible = $visible;
		return $this;
	}

	/**
	 * Set showing of the chat
	 *
	 * @api
	 * @param bool $visible If the chat should be shown
	 * @return static
	 */
	public function setChatVisible($visible) {
		$this->chatVisible = $visible;
		return $this;
	}

	/**
	 * Set showing of the checkpoint list
	 *
	 * @api
	 * @param bool $visible If the checkpoint should be shown
	 * @return static
	 */
	public function setCheckpointListVisible($visible) {
		$this->checkpointListVisible = $visible;
		return $this;
	}

	/**
	 * Set showing of round scores
	 *
	 * @api
	 * @param bool $visible If the round scores should be shown
	 * @return static
	 */
	public function setRoundScoresVisible($visible) {
		$this->roundScoresVisible = $visible;
		return $this;
	}

	/**
	 * Set showing of the scoretable
	 *
	 * @api
	 * @param bool $visible If the scoretable should be shown
	 * @return static
	 */
	public function setScoretableVisible($visible) {
		$this->scoretableVisible = $visible;
		return $this;
	}

	/**
	 * Set global showing
	 *
	 * @api
	 * @param bool $visible If the UI should be disabled completely
	 * @return static
	 */
	public function setGlobalVisible($visible) {
		$this->globalVisible = $visible;
		return $this;
	}

	/**
	 * Render the CustomUI
	 *
	 * @param \DOMDocument $domDocument (optional) DOMDocument for which the CustomUI should be rendered
	 * @return \DOMDocument
	 */
	public function render($domDocument = null) {
		$isChild = (bool)$domDocument;
		if (!$isChild) {
			$domDocument                = new \DOMDocument('1.0', $this->encoding);
			$domDocument->xmlStandalone = true;
		}
		$domElement = $domDocument->createElement($this->tagName);
		if (!$isChild) {
			$domDocument->appendChild($domElement);
		}
		$settings = $this->getSettings();
		foreach ($settings as $setting => $value) {
			if ($value === null) {
				continue;
			}
			$domSubElement = $domDocument->createElement($setting);
			$domSubElement->setAttribute('visible', ($value ? 1 : 0));
			$domElement->appendChild($domSubElement);
		}
		if ($isChild) {
			return $domElement;
		}
		return $domDocument;
	}

	/**
	 * Get string representation
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->render()->saveXML();
	}

	/**
	 * Get associative array of all CustomUI settings
	 *
	 * @return array
	 */
	protected function getSettings() {
		$settings                    = array();
		$settings['challenge_info']  = $this->challengeInfoVisible;
		$settings['chat']            = $this->chatVisible;
		$settings['checkpoint_list'] = $this->checkpointListVisible;
		$settings['global']          = $this->globalVisible;
		$settings['net_infos']       = $this->netInfosVisible;
		$settings['notice']          = $this->noticeVisible;
		$settings['round_scores']    = $this->roundScoresVisible;
		$settings['scoretable']      = $this->scoretableVisible;
		return $settings;
	}

}
