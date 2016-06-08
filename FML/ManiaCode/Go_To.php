<?php

namespace FML\ManiaCode;

/**
 * ManiaCode Element for going to a link
 *
 * @author    steeffeen
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Go_To extends Element {

	/*
	 * Protected properties
	 */
	protected $tagName = 'goto';
	protected $link = null;

	/**
	 * Create a new Go_To Element
	 *
	 * @api
	 * @param string $link (optional) Goto link
	 * @return static
	 */
	public static function create($link = null) {
		return new static($link);
	}

	/**
	 * Construct a new Go_To Element
	 *
	 * @api
	 * @param string $link (optional) Goto link
	 */
	public function __construct($link = null) {
		if ($link !== null) {
			$this->setLink($link);
		}
	}

	/**
	 * Set the link
	 *
	 * @api
	 * @param string $link Goto link
	 * @return static
	 */
	public function setLink($link) {
		$this->link = (string)$link;
		return $this;
	}

	/**
	 * @see Element::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$domElement = $domDocument->createElement("view_replay");

		$linkElement = $domDocument->createElement('link', $this->link);
		$domElement->appendChild($linkElement);
		
		return $domElement;
	}

}
