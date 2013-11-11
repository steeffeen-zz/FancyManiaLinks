<?php

namespace FML;

require_once __DIR__ . '/Control.php';

/**
 * Class representing CMlFrame
 *
 * @author Steff
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
	 */
	public function add(Renderable $child) {
		array_push($this->children, $child);
	}

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Renderable::render()
	 */
	public function render() {
		$xml = parent::render();
		foreach ($this->children as $child) {
			$childXml = $child->render();
			$xml->appendChild($childXml);
		}
		return $xml;
	}
}

?>
