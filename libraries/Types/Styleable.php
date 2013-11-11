<?php

namespace FML;

/**
 * Interface for elements with style attribute
 *
 * @author steeffeen
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
