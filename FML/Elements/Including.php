<?php

namespace FML\Elements;

/**
 * Class representing include
 *
 * @author steeffeen
 */
class Including implements Renderable {
	/**
	 * Protected properties
	 */
	protected $url = '';

	/**
	 * Construct include element
	 */
	public function __construct() {
		$this->name = 'include';
	}

	/**
	 * Set url
	 *
	 * @param string $url        	
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Renderable::render()
	 */
	public function render() {
		$xml = new \DOMElement($this->name);
		$xml->setAttribute('url', $this->url);
		return $xml;
	}
}

?>
