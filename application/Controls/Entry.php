<?php

namespace FML;

/**
 * Class representing CMlEntry
 *
 * @author Steff
 */
class Entry extends Control implements Styleable, TextFormatable, NewLineable, Scriptable {
	/**
	 * Protected properties
	 */
	protected $name = '';
	protected $default = '';

	/**
	 * Set name
	 *
	 * @param string $name        	
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Set default
	 *
	 * @param string $default        	
	 */
	public function setDefault($default) {
		$this->default = $default;
	}
}

?>
