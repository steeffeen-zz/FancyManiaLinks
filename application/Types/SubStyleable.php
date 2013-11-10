<?php

namespace FML;

/**
 * Type with substyle attribute
 *
 * @author Steff
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
