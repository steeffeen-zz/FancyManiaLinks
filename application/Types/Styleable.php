<?php

namespace FML;

/**
 * Type with style attribute
 *
 * @author Steff
 */
interface Styleable {
	/**
	 * Protected properties
	 */
	protected $style = '';

	/**
	 * Set style
	 *
	 * @param string $style        	
	 */
	public function setStyle($style);
}

?>
