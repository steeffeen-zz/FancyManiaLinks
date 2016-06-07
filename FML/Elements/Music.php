<?php

namespace FML\Elements;

use FML\Types\Renderable;

/**
 * Music Element
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class Music implements Renderable {

	/*
	 * Protected properties
	 */
	protected $tagName = 'music';
	protected $data = null;

	/**
	 * Create a new Music
	 *
	 * @api
	 * @param string $data (optional) Media url
	 * @return static
	 */
	public static function create($data = null) {
		return new static($data);
	}

	/**
	 * Construct a new Music
	 *
	 * @api
	 * @param string $data (optional) Media url
	 */
	public function __construct($data = null) {
		if ($data !== null) {
			$this->setData($data);
		}
	}

	/**
	 * Set the data url
	 *
	 * @api
	 * @param string $data Data url
	 * @return static
	 */
	public function setData($data) {
		$this->data = (string)$data;
		return $this;
	}

	/**
	 * @see Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$domElement = $domDocument->createElement($this->tagName);
		if ($this->data) {
			$domElement->setAttribute('data', $this->data);
		}
		return $domElement;
	}
	
}
