<?php

namespace FML;

/**
 * Interface for renderable elements
 *
 * @author steeffeen
 */
interface Renderable {
	/**
	 * Protected properties
	 */
	protected $name = 'tag';

	/**
	 * Render the xml element
	 *
	 * @return \DOMElement
	 */
	public function render();
}

?>
