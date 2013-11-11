<?php

namespace FML;

require_once __DIR__ . '/Control.php';
require_once __DIR__ . '/../Types/NewLineable.php';
require_once __DIR__ . '/../Types/Scriptable.php';
require_once __DIR__ . '/../Types/Styleable.php';
require_once __DIR__ . '/../Types/TextFormatable.php';

/**
 * Class representing CMlEntry
 *
 * @author Steff
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
