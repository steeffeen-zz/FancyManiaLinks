<?php

namespace FML;

/**
 * Interface for elements with autonewline attribute
 *
 * @author steeffeen
 */
interface NewLineable {
	/**
	 * Protected properties
	 */
	protected $autoNewLine = 0;

	/**
	 * Set auto new line
	 * 
	 * @param bool $autoNewLine        	
	 */
	public function setAutoNewLine($autoNewLine);
}

?>
