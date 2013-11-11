<?php

namespace FML\Elements;

/**
 * Class representing a format
 *
 * @author steeffeen
 */
class Format implements BgColorable, Renderable, Styleable, TextFormatable {

	/**
	 * Construct format element
	 */
	public function __construct() {
		$this->name = 'format';
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Renderable::render()
	 */
	public function render() {
		$xml = new \DOMElement($this->name);
		return $xml;
	}
}

?>
