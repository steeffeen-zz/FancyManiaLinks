<?php

namespace FML;

/**
 * Class indicating autonewline attribute
 *
 * @author Steff
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
