<?php

namespace FML\Controls;

use FML\Types\Renderable;

/**
 * Class representing CMlFrame
 *
 * @author steeffeen
 */
class Frame extends Control {
	/**
	 * Private properties
	 */
	private $children = array();

	/**
	 * Construct frame control
	 */
	public function __construct() {
		$this->name = 'frame';
	}

	/**
	 * Add a new child
	 *
	 * @param mixed $child        	
	 * @return \FML\Controls\Frame
	 */
	public function add(Renderable $child) {
		array_push($this->children, $child);
		return $this;
	}

	/**
	 *
	 * @see \FML\Renderable::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$xml = parent::render($domDocument);
		foreach ($this->children as $child) {
			$childXml = $child->render($domDocument);
			$xml->appendChild($childXml);
		}
		return $xml;
	}
}

?>
