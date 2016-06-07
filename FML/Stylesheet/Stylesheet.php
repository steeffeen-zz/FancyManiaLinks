<?php

namespace FML\Stylesheet;

/**
 * Class representing a ManiaLink Stylesheet
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Stylesheet {

	/*
	 * Protected properties
	 */
	protected $tagName = 'stylesheet';
	/** @var Style3d[] $styles3d */
	protected $styles3d = array();
	/** @var Mood $mood */
	protected $mood = null;

	/**
	 * Create a new Stylesheet
	 *
	 * @api
	 * @return static
	 */
	public static function create() {
		return new static();
	}

	/**
	 * Add a new Style3d
	 *
	 * @api
	 * @param Style3d $style3d The Style3d to be added
	 * @return static
	 */
	public function addStyle3d(Style3d $style3d) {
		if (!in_array($style3d, $this->styles3d, true)) {
			array_push($this->styles3d, $style3d);
		}
		return $this;
	}

	/**
	 * Remove all Style3ds
	 *
	 * @api
	 * @return static
	 */
	public function removeStyles() {
		$this->styles3d = array();
		return $this;
	}

	/**
	 * Set the Mood of the Stylesheet
	 *
	 * @api
	 * @param Mood $mood Mood object
	 * @return static
	 */
	public function setMood(Mood $mood) {
		$this->mood = $mood;
		return $this;
	}

	/**
	 * Get the Mood
	 *
	 * @api
	 * @param bool $createIfEmpty (optional) If the Mood object should be created if it's not set
	 * @return Mood
	 */
	public function getMood($createIfEmpty = true) {
		if (!$this->mood && $createIfEmpty) {
			$this->setMood(new Mood());
		}
		return $this->mood;
	}

	/**
	 * Render the Stylesheet
	 *
	 * @param \DOMDocument $domDocument DOMDocument for which the Stylesheet should be rendered
	 * @return \DOMElement
	 */
	public function render(\DOMDocument $domDocument) {
		$stylesheetXml = $domDocument->createElement($this->tagName);
		if ($this->styles3d) {
			$stylesXml = $domDocument->createElement('frame3dstyles');
			$stylesheetXml->appendChild($stylesXml);
			foreach ($this->styles3d as $style3d) {
				$style3dXml = $style3d->render($domDocument);
				$stylesXml->appendChild($style3dXml);
			}
		}
		if ($this->mood) {
			$moodXml = $this->mood->render($domDocument);
			$stylesheetXml->appendChild($moodXml);
		}
		return $stylesheetXml;
	}

}
