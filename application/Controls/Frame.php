<?php

namespace FML;

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
	 * Add a new child
	 *
	 * @param mixed $child        	
	 */
	public function add(Addable $child) {
		array_push($this->children, $child);
	}
}

?>
