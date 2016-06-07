<?php

namespace FML\ManiaCode;

/**
 * ManiaCode Element installing a skin
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class InstallSkin extends Element {

	/*
	 * Protected properties
	 */
	protected $tagName = 'install_skin';
	protected $name = null;
	protected $file = null;
	protected $url = null;

	/**
	 * Create a new InstallSkin Element
	 *
	 * @api
	 * @param string $name (optional) Skin name
	 * @param string $file (optional) Skin file
	 * @param string $url  (optional) Skin url
	 * @return static
	 */
	public static function create($name = null, $file = null, $url = null) {
		return new static($name, $file, $url);
	}

	/**
	 * Construct a new InstallSkin Element
	 *
	 * @api
	 * @param string $name (optional) Skin name
	 * @param string $file (optional) Skin file
	 * @param string $url  (optional) Skin url
	 */
	public function __construct($name = null, $file = null, $url = null) {
		if ($name !== null) {
			$this->setName($name);
		}
		if ($file !== null) {
			$this->setFile($file);
		}
		if ($url !== null) {
			$this->setUrl($url);
		}
	}

	/**
	 * Set the name of the skin
	 *
	 * @api
	 * @param string $name Skin name
	 * @return static
	 */
	public function setName($name) {
		$this->name = (string)$name;
		return $this;
	}

	/**
	 * Set the file of the skin
	 *
	 * @api
	 * @param string $file Skin file
	 * @return static
	 */
	public function setFile($file) {
		$this->file = (string)$file;
		return $this;
	}

	/**
	 * Set the url of the skin
	 *
	 * @api
	 * @param string $url Skin url
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
		$fileElement = $domDocument->createElement('file', $this->file);
		$domElement->appendChild($fileElement);
		$urlElement = $domDocument->createElement('url', $this->url);
		$domElement->appendChild($urlElement);
		return $domElement;
	}
	
}
