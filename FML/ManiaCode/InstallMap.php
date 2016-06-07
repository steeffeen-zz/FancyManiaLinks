<?php

namespace FML\ManiaCode;

/**
 * ManiaCode Element installing a map
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class InstallMap extends Element {

	/*
	 * Protected properties
	 */
	protected $tagName = 'install_map';
	protected $name = null;
	protected $url = null;

	/**
	 * Create a new InstallMap Element
	 *
	 * @api
	 * @param string $name (optional) Map name
	 * @param string $url  (optional) Map url
	 * @return static
	 */
	public static function create($name = null, $url = null) {
		return new static($name, $url);
	}

	/**
	 * Construct a new InstallMap Element
	 *
	 * @api
	 * @param string $name (optional) Map name
	 * @param string $url  (optional) Map url
	 */
	public function __construct($name = null, $url = null) {
		if ($name !== null) {
			$this->setName($name);
		}
		if ($url !== null) {
			$this->setUrl($url);
		}
	}

	/**
	 * Set the name of the map
	 *
	 * @api
	 * @param string $name Map name
	 * @return static
	 */
	public function setName($name) {
		$this->name = (string)$name;
		return $this;
	}

	/**
	 * Set the url of the map
	 *
	 * @api
	 * @param string $url Map url
	 * @return static
	 */
	public function setUrl($url) {
		$this->url = (string)$url;
		return $this;
	}

	/**
	 * @see Element::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$domElement  = parent::render($domDocument);
		$nameElement = $domDocument->createElement('name', $this->name);
		$domElement->appendChild($nameElement);
		$urlElement = $domDocument->createElement('url', $this->url);
		$domElement->appendChild($urlElement);
		return $domElement;
	}
	
}
