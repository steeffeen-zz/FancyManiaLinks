<?php

namespace FML\Types;

/**
 * Interface for elements with background color attribute
 * 
 * @author steeffeen
 */
interface BgColorable {
	/**
	 * Protected properties
	 */
	protected $bgColor = '';

	/**
	 * Set background color
	 *
	 * @param string $bgColor        	
	 */
	public function setBgColor($bgColor);
}

?>
