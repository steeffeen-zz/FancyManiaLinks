<?php

namespace FML\Controls;

/**
 * Class representing CMlEntry
 *
 * @author steeffeen
 */
class Entry extends Control implements NewLineable, Scriptable, Styleable, TextFormatable {
	/**
	 * Protected properties
	 */
	protected $name = '';
	protected $default = '';

	/**
	 * Construct entry control
	 */
	public function __construct() {
		$this->name = 'entry';
	}

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

	/**
	 * (non-PHPdoc)
	 *
	 * @see \FML\Control::render()
	 */
	public function render() {
		$xml = parent::render();
		$xml->setAttribute('name', $this->name);
		$xml->setAttribute('default', $this->default);
		return $xml;
	}
}

?>
