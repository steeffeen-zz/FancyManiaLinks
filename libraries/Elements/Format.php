<?php

namespace FML;

require_once __DIR__ . '/../Types/BgColorable.php';
require_once __DIR__ . '/../Types/Renderable.php';
require_once __DIR__ . '/../Types/Styleable.php';
require_once __DIR__ . '/../Types/TextFormatable.php';

/**
 * Class representing a format
 *
 * @author Steff
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
