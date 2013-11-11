<?php

namespace FML\Elements;

/**
 * Class representing music
 *
 * @author steeffeen
 */
class Music implements Renderable {
	/**
	 * Protected properties
	 */
	protected $data = '';

	/**
	 * Construct music element
	 */
	public function __construct() {
		$this->name = 'music';
	}

	/**
	 * Set data
	 *
	 * @param string $data        	
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Renderable::render()
	 */
	public function render() {
		$xml = new \DOMElement($this->name);
		$xml->setAttribute('data', $this->data);
		return $xml;
	}
}

?>
