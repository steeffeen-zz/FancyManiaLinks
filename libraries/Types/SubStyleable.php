<?php

namespace FML;

/**
 * Interface for elements with substyle attribute
 *
 * @author steeffeen
 */
interface SubStyleable {
	/**
	 * Protected properties
	 */
	protected $subStyle = '';

	/**
	 * Set substyle
	 *
	 * @param string $subStyle        	
	 */
	public function setSubStyle($subStyle);
}

?>
