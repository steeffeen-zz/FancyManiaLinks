<?php

namespace FML\ManiaCode;

/**
 * ManiaCode Element installing a Title Pack
 *
 * @author steeffeen
 */
class InstallPack implements Element {
	/**
	 * Protected Properties
	 */
	protected $tagName = 'install_pack';
	protected $name = '';
	protected $file = '';
	protected $url = '';

	/**
	 * Construct a new InstallPack Element
	 *
	 * @param string $name Pack Name
	 * @param string $file Pack File
	 * @param string $url Pack Url
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
	 * Set the Name of the Script
	 *
	 * @param string $name Pack Name
	 * @return \FML\ManiaCode\InstallPack
	 */	
	public function setName($name) {
		$this->name = (string) $name;
		return $this;
	}

	/**
	 * Set the File of the Script
	 *
	 * @param string $file Pack File
	 * @return \FML\ManiaCode\InstallPack
	 */
	public function setFile($file) {
		$this->file = (string) $file;
		return $this;
	}

	/**
	 * Set the Url of the Script
	 *
	 * @param string $url Pack Url
	 * @return \FML\ManiaCode\InstallPack
	 */
	public function setUrl($url) {
		$this->url = (string) $url;
		return $this;
	}

	/**
	 *
	 * @see \FML\ManiaCode\Element::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$xmlElement = $domDocument->createElement($this->tagName);
		$nameElement = $domDocument->createElement('name', $this->name);
		$xmlElement->appendChild($nameElement);
		$fileElement = $domDocument->createElement('file', $this->file);
		$xmlElement->appendChild($fileElement);
		$urlElement = $domDocument->createElement('url', $this->url);
		$xmlElement->appendChild($urlElement);
		return $xmlElement;
	}
}
